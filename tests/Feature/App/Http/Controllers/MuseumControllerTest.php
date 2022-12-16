<?php

namespace Tests\Feature\App\Http\Controllers\Auth;

use Tests\TestCase;
use App\Models\Museum;
use App\Http\Controllers\MuseumController;
use Illuminate\Foundation\Testing\RefreshDatabase;



class MuseumControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
    * @test
    * @return void
    */
    public function is_museum_page_success():void
    {
        $this->get(action([MuseumController::class,'index']))
            ->assertOk()
            ->assertViewIs ('page.museum.index'); 
    }

    /**
    * @test
    * @return void
    */
    public function is_no_active_museum_page_success():void
    {   
        
        $museum = Museum::factory()->create([
            'title' => 'museum_title_test',
            'status' => 0 
        ]);

        $this->assertDatabaseHas('museums',[
            'slug' =>$museum['slug']
        ]);
    
        $this->get(action([MuseumController::class, 'index']))
            ->assertOk()
            ->assertDontSee($museum->title); 
    } 

    /**
    * @test
    * @return void
    */
    public function is_museum_single_success():void
    {   
        $museum = Museum::factory()->create(['status'=> 1]);

        $this->assertDatabaseHas('museums',[
            'slug' =>$museum['slug']
        ]);
     
        $this->get(action([MuseumController::class, 'show'],['museum'=>$museum->slug]))
            ->assertOk()
            ->assertSee($museum->slug); 

    } 

    /**
    * @test
    * @return void
    */
    public function is_no_active_museum_single_success():void
    {   
        $museum = Museum::factory()->create(['status'=>0]);

        $this->assertDatabaseHas('museums',[
            'slug' =>$museum['slug']
        ]);

        $this->get(action([MuseumController::class, 'show'],['museum'=>$museum->slug]))
            ->assertStatus(404); 
    } 

}