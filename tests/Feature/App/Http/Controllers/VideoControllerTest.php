<?php

namespace Tests\Feature\App\Http\Controllers\Auth;

use Tests\TestCase;
use App\Models\Video;
use App\Http\Controllers\VideoController;
use Illuminate\Foundation\Testing\RefreshDatabase;



class VideoControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
    * @test
    * @return void
    */
    public function is_video_page_success():void
    {
        $this->get(action([VideoController::class,'index']))
            ->assertOk()
            ->assertViewIs ('page.media.video.index'); 
    }

    /**
    * @test
    * @return void
    */
    public function is_no_active_video_page_success():void
    {   
        
        $video = Video::factory()->create([
            'title' => 'video_title_test',
            'status' => 0 
        ]);

        $this->assertDatabaseHas('videos',[
            'slug' =>$video['slug']
        ]);
    
        $this->get(action([VideoController::class, 'index']))
            ->assertOk()
            ->assertDontSee($video->title); 
    } 

    /**
    * @test
    * @return void
    */
    public function is_video_single_success():void
    {   
        $video = Video::factory()->create(['status'=> 1]);

        $this->assertDatabaseHas('videos',[
            'slug' =>$video['slug']
        ]);
     
        $this->get(action([VideoController::class, 'show'],['video'=>$video->slug]))
            ->assertOk()
            ->assertSee($video->slug); 

    } 

    /**
    * @test
    * @return void
    */
    public function is_no_active_video_single_success():void
    {   
        $video = Video::factory()->create(['status'=>0]);

        $this->assertDatabaseHas('videos',[
            'slug' =>$video['slug']
        ]);

        $this->get(action([VideoController::class, 'show'],['video'=>$video->slug]))
            ->assertStatus(404); 
    } 

}