<?php

namespace Tests\Feature\App\Http\Controllers\Auth;

use Tests\TestCase;
use App\Models\Post;
use App\Http\Controllers\PostController;
use Illuminate\Foundation\Testing\RefreshDatabase;



class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
    * @test
    * @return void
    */
    public function is_post_page_success():void
    {
        $this->get(action([PostController::class,'index']))
            ->assertOk()
            ->assertViewIs ('page.post.index'); 
    }

    /**
    * @test
    * @return void
    */
    public function is_no_active_post_page_success():void
    {   
        
        $post = Post::factory()->create([
            'title' => 'post_title_test',
            'status' => 0 
        ]);

        $this->assertDatabaseHas('posts',[
            'slug' =>$post['slug']
        ]);
    
        $this->get(action([PostController::class, 'index']))
            ->assertOk()
            ->assertDontSee($post->title); 
    } 

    /**
    * @test
    * @return void
    */
    public function is_post_single_success():void
    {   
        $post = Post::factory()->create(['status'=> 1]);

        $this->assertDatabaseHas('posts',[
            'slug' =>$post['slug']
        ]);
     
        $this->get(action([PostController::class, 'show'],['post'=>$post->slug]))
            ->assertOk()
            ->assertSee($post->slug); 

    } 

    /**
    * @test
    * @return void
    */
    public function is_no_active_post_single_success():void
    {   
        $post = Post::factory()->create(['status'=>0]);

        $this->assertDatabaseHas('posts',[
            'slug' =>$post['slug']
        ]);

        $this->get(action([PostController::class, 'show'],['post'=>$post->slug]))
            ->assertStatus(404); 
    } 

}