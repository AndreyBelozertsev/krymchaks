<?php

namespace Tests\Feature\App\Http\Controllers\Auth;

use Tests\TestCase;
use App\Models\Post;
use App\Models\Place;
use App\Models\AboutCategory;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\HomePageController;
use Illuminate\Foundation\Testing\RefreshDatabase;



class HomePageControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
    * @test
    * @return void
    */
    public function is_home_page_success():void
    {
        $this->get(action([HomePageController::class]))
            ->assertOk()
            ->assertViewIs ('page.home'); 
    } 

    /**
    * @test
    * @return void
    */
     public function is_main_post_success():void
    {
        $post = Post::factory()->create([
            'is_fixed' => 1
        ]);

        $this->assertDatabaseHas('posts',[
            'slug' =>$post['slug']
        ]);

        $this->get(action([HomePageController::class]))
            ->assertOk()
            ->assertSee($post['slug'])
            ->assertViewIs ('page.home'); 
    }

    /**
    * @test
    * @return void
    */
    public function is_posts_success():void
    {
        $posts = Post::factory()->count(5)->create();


        foreach($posts as $post){
            $this->assertDatabaseHas('posts',[
                'slug' =>$post['slug']
            ]);
        }

        $response = $this->get(action([HomePageController::class]))
            ->assertOk()
            ->assertViewIs ('page.home'); 
        
        foreach($posts as $post){
            $response->assertSee($post['slug']);
        }
    }

    /**
    * @test
    * @return void
    */
    public function is_no_active_post_success():void
    {
        $post = Post::factory()->create([
            'title'=>'post-no-active-test',
            'status' => 0
        ]);

        $this->assertDatabaseHas('posts',[
            'slug' =>$post['slug']
        ]);

        $this->get(action([HomePageController::class]))
            ->assertOk()
            ->assertDontSee($post['slug'])
            ->assertViewIs ('page.home'); 
    }

    /**
    * @test
    * @return void
    */
    public function is_types_success():void
    {
        $categories = AboutCategory::factory()->count(5)->create(['is_fixed'=>1]);

        foreach($categories as $category){
            $this->assertDatabaseHas('about_categories',[
                'slug' =>$category['slug']
            ]);
        }
        
        $response = $this->get(action([HomePageController::class]))
            ->assertOk()
            ->assertViewIs ('page.home'); 
        
        foreach($categories as $category){
            $response->assertSee($category['slug']);
        }
    }

    /**
    * @test
    * @return void
    */
    public function is_no_active_type_success():void
    {
        $category = AboutCategory::factory()->create([
            'title'=>'category-no-active-test',
            'status' => 0
        ]);

        $this->assertDatabaseHas('about_categories',[
            'slug' =>$category['slug']
        ]);

        $this->get(action([HomePageController::class]))
            ->assertOk()
            ->assertDontSee($category['slug'])
            ->assertViewIs ('page.home'); 
    }


    /**
    * @test
    * @return void
    */
    public function is_places_success():void
    {
        $places = Place::factory()->count(30)->create();

        foreach($places as $place){
            $this->assertDatabaseHas('places',[
                'slug' =>$place['slug']
            ]);
        }

        $response = $this->get(action([HomePageController::class]))
            ->assertOk()
            ->assertViewIs ('page.home'); 
        
        foreach($places as $place){
            $response->assertSee($place['coordinates']);
        }
    }

    /**
    * @test
    * @return void
    */
    public function is_no_active_place_success():void
    {
        $place = Place::factory()->create([
            'status' => 0
        ]);

        $this->assertDatabaseHas('places',[
            'slug' =>$place['slug']
        ]);

        $this->get(action([HomePageController::class]))
            ->assertOk()
            ->assertDontSee($place['coordinates'])
            ->assertViewIs ('page.home'); 
    }

    /**
    * @test
    * @return void
    */
    public function is_cache_refresh_after_saved(){
        Post::factory()->create([
            'is_fixed' => 1
        ]);
        $this->get(action([HomePageController::class]))
            ->assertOk();
        
        $this->assertTrue( Cache::has('main_post_home_page'));
        $this->assertTrue( Cache::has('posts_home_page'));
        $this->assertTrue( Cache::has('about_categories_home_page'));
        $this->assertTrue( Cache::has('places'));

        Post::factory()->create();
        AboutCategory::factory()->create();
        Place::factory()->create();

        $this->assertTrue(! Cache::has('main_post_home_page'));
        $this->assertTrue(! Cache::has('posts_home_page'));
        $this->assertTrue(! Cache::has('about_categories_home_page'));
        $this->assertTrue(! Cache::has('places'));
        
    }

}

