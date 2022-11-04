<?php

namespace Tests\Feature\App\Http\Controllers\Auth;

use Tests\TestCase;
use App\Models\Audio;
use App\Http\Controllers\AudioController;
use Illuminate\Foundation\Testing\RefreshDatabase;



class AudioControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
    * @test
    * @return void
    */
    public function is_audio_page_success():void
    {
        $this->get(action([AudioController::class,'index']))
            ->assertOk()
            ->assertViewIs ('page.archive.audio.index'); 
    }

    /**
    * @test
    * @return void
    */
    public function is_no_active_audio_page_success():void
    {   
        
        $audio = Audio::factory()->create([
            'title' => 'audio_title_test',
            'status' => 0 
        ]);

        $this->assertDatabaseHas('audio',[
            'slug' =>$audio['slug']
        ]);
    
        $this->get(action([AudioController::class, 'index']))
            ->assertOk()
            ->assertDontSee($audio->title); 
    } 

    /**
    * @test
    * @return void
    */
    public function is_audio_single_success():void
    {   
        $audio = Audio::factory()->create(['status'=> 1]);

        $this->assertDatabaseHas('audio',[
            'slug' =>$audio['slug']
        ]);
     
        $this->get(action([AudioController::class, 'show'],['audio'=>$audio->slug]))
            ->assertOk()
            ->assertSee($audio->slug); 

    } 

    /**
    * @test
    * @return void
    */
    public function is_no_active_audio_single_success():void
    {   
        $audio = Audio::factory()->create(['status'=>0]);

        $this->assertDatabaseHas('audio',[
            'slug' =>$audio['slug']
        ]);

        $this->get(action([AudioController::class, 'show'],['audio'=>$audio->slug]))
            ->assertStatus(404); 
    } 

}