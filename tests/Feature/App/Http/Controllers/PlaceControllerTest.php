<?php

namespace Tests\Feature\App\Http\Controllers\Auth;

use Tests\TestCase;
use App\Models\Place;
use App\Http\Controllers\PlaceController;
use Illuminate\Foundation\Testing\RefreshDatabase;



class PlaceControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
    * @test
    * @return void
    */
    public function is_place_page_success():void
    {
        $this->get(action([PlaceController::class,'index']))
            ->assertOk()
            ->assertViewIs ('page.place.index'); 
    }

    /**
    * @test
    * @return void
    */
    public function is_no_active_place_page_success():void
    {   
      
        $place = Place::factory()->create([
            'title' => 'place_title_test',
            'status' => 0 
        ]);

        $this->assertDatabaseHas('places',[
            'slug' =>$place['slug']
        ]);

        $this->get(action([PlaceController::class, 'index']))
            ->assertOk()
            ->assertDontSee($place->title); 
    } 

    /**
    * @test
    * @return void
    */
    public function is_place_single_success():void
    {   
        
        $place = Place::factory()->create();

        $this->assertDatabaseHas('places',[
            'slug' =>$place['slug']
        ]);

        $this->get(action([PlaceController::class, 'show'],['place'=>$place->slug]))
            ->assertOk()
            ->assertSee($place->slug); 
    } 

    /**
    * @test
    * @return void
    */
    public function is_no_active_place_single_success():void
    {   
        $place = Place::factory()->create(['status'=>0]);

        $this->assertDatabaseHas('places',[
            'slug' =>$place['slug']
        ]);

        $this->get(action([PlaceController::class, 'show'],['place'=>$place->slug]))
            ->assertStatus(404); 
    } 

}