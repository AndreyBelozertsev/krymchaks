<?php

namespace Tests\Feature\App\Http\Controllers\Auth;

use Tests\TestCase;
use App\Models\PrintedProduction;
use App\Http\Controllers\PrintedProductionController;
use Illuminate\Foundation\Testing\RefreshDatabase;



class PrintedProductionControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
    * @test
    * @return void
    */
    public function is_printed_production_page_success():void
    {
        $this->get(action([PrintedProductionController::class,'index']))
            ->assertOk()
            ->assertViewIs ('page.printed-production.index'); 
    }

    /**
    * @test
    * @return void
    */
    public function is_no_active_printed_production_page_success():void
    {   
        
        $printedProduct = PrintedProduction::factory()->create([
            'title' => 'printed_production_title_test',
            'status' => 0 
        ]);

        $this->assertDatabaseHas('printed_productions',[
            'slug' =>$printedProduct['slug']
        ]);
    
        $this->get(action([PrintedProductionController::class, 'index']))
            ->assertOk()
            ->assertDontSee($printedProduct->title); 
    } 

    /**
    * @test
    * @return void
    */
    public function is_printed_production_single_success():void
    {   
        $printedProduct = PrintedProduction::factory()->create(['status'=> 1]);

        $this->assertDatabaseHas('printed_productions',[
            'slug' =>$printedProduct['slug']
        ]);
     
        $this->get(action([PrintedProductionController::class, 'show'],['product'=>$printedProduct->slug]))
            ->assertOk()
            ->assertSee($printedProduct->slug); 

    } 

    /**
    * @test
    * @return void
    */
    public function is_no_active_printed_production_single_success():void
    {   
        $printedProduct = PrintedProduction::factory()->create(['status'=>0]);

        $this->assertDatabaseHas('printed_productions',[
            'slug' =>$printedProduct['slug']
        ]);

        $this->get(action([PrintedProductionController::class, 'show'],['product'=>$printedProduct->slug]))
            ->assertStatus(404); 
    } 

}