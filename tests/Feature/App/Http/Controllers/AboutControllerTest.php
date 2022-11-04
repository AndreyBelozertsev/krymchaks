<?php

namespace Tests\Feature\App\Http\Controllers\Auth;

use Tests\TestCase;
use App\Models\About;
use App\Models\AboutCategory;
use App\Http\Controllers\AboutController;
use Illuminate\Foundation\Testing\RefreshDatabase;



class AboutControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
    * @test
    * @return void
    */
    public function is_about_page_success():void
    {   
        $category = AboutCategory::factory()->create();

        $this->get(action([AboutController::class, 'index'],['category'=>$category->slug]))
            ->assertOk()
            ->assertViewIs ('page.about.index'); 
    } 

    /**
    * @test
    * @return void
    */
    public function is_no_active_about_type_success():void
    {   
        $category = AboutCategory::factory()->create(['status'=>0]);

        $this->get(action([AboutController::class, 'index'],['category'=>$category->slug]))
            ->assertStatus(404); 
    } 

    /**
    * @test
    * @return void
    */
    public function is_about_type_success():void
    {   
        $category = AboutCategory::factory()->create();

        $abouts = About::factory()->count(24)->create(['about_category_id'=>$category->id]);

        foreach($abouts as $about){
            $this->assertDatabaseHas('abouts',[
                'slug' =>$about['slug']
            ]);
        }

        $response = $this->get(action([AboutController::class, 'index'],['category'=>$category->slug]))
            ->assertOk()
            ->assertViewIs ('page.about.index');     
            
        foreach($abouts as $about){
            $response->assertSee($about['slug']);
        }
    }

    /**
    * @test
    * @return void
    */
    public function is_about_single_success():void
    {   
        $category = AboutCategory::factory()->create();

        $about = About::factory()->create(['about_category_id'=>$category->id]);

        $this->get(action([AboutController::class, 'show'],['category'=>$category->slug, 'about'=>$about->slug]))
            ->assertOk()
            ->assertSee($about->title); 
    } 

    /**
    * @test
    * @return void
    */
    public function is_no_active_about_single_success():void
    {   
        $category = AboutCategory::factory()->create();

        $about = About::factory()->create(['about_category_id'=>$category->id,'status'=>0]);

        $this->get(action([AboutController::class, 'show'],['category'=>$category->slug, 'about'=>$about->slug]))
            ->assertStatus(404); 
    } 
}