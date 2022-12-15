<?php

namespace Tests\Feature\App\Http\Controllers\Auth;

use Tests\TestCase;
use App\Models\Navigation;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\HomePageController;
use Illuminate\Foundation\Testing\RefreshDatabase;



class NavigationTest extends TestCase
{
    use RefreshDatabase;
    /**
    * @test
    * @return void
    */
    public function is_cache_refresh_after_saved(){
        Navigation::factory()->create();
        $this->get(action([HomePageController::class]))
            ->assertOk();
        
        $this->assertTrue( Cache::has('navigation_menu'));

        Navigation::factory()->create();

        $this->assertTrue(! Cache::has('navigation_menu'));
        
    }
}