<?php

namespace Tests\Feature\App\Http\Controllers\Auth;

use Tests\TestCase;
use App\Models\User;
use App\Http\Requests\SendContactForm;
use App\Notifications\ContactFormSend;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Notification;
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

        Notification::fake();

        User::factory()->create(['email'=>'info.rakurs@bk.ru']);

        $request = SendContactForm::factory()->create();
        
        $response = $this->post(action([SettingController::class, 'sendForm']), $request);

        Notification::assertSentTo(User::all(), ContactFormSend::class);

    }

}