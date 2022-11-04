<?php

namespace Tests\Feature\App\Http\Controllers\Auth;

use Tests\TestCase;
use App\Http\Requests\SendContactForm;
use App\Http\Controllers\SettingController;
use Illuminate\Foundation\Testing\RefreshDatabase;



class SettingControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
    * @test
    * @return void
    */
    public function is_send_contact_form_success():void
    {
        $request = SendContactForm::factory()->create();
        
        $response = $this->post(action([SettingController::class, 'sendForm']), $request);

    }

}