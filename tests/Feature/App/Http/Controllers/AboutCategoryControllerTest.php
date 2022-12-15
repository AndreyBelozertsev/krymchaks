<?php

namespace Tests\Feature\App\Http\Controllers\Auth;

use Tests\TestCase;
use App\Models\About;
use App\Models\AboutCategory;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AboutCategoryController;
use Illuminate\Foundation\Testing\RefreshDatabase;



class AboutCategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
    * @test
    * @return void
    */
    public function is_about_category_page_success():void
    {   
        $category = AboutCategory::factory()->create();

        $this->get(action([AboutCategoryController::class, 'show'],['category'=>$category->slug]))
            ->assertOk()
            ->assertViewIs ('page.about-category.show'); 
    } 

    /**
    * @test
    * @return void
    */
    public function is_no_active_about_type_success():void
    {   
        $category = AboutCategory::factory()->create(['status'=>0]);

        $this->get(action([AboutCategoryController::class, 'show'],['category'=>$category->slug]))
            ->assertStatus(404); 
    } 

    /**
    * @test
    * @return void
    */
    public function is_about_type_success():void
    {   
        $category = AboutCategory::factory()->create();

        $abouts = About::factory()->count(5)->create(['about_category_id'=>$category->id]);

        foreach($abouts as $about){
            $this->assertDatabaseHas('abouts',[
                'slug' =>$about['slug']
            ]);
        }

        $response = $this->get(action([AboutCategoryController::class, 'show'],['category'=>$category->slug]))
            ->assertOk()
            ->assertViewIs ('page.about-category.show');     
            
        foreach($abouts as $about){
            $response->assertSee($about['slug']);
        }
    }
}