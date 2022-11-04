<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\SendContactForm;
use App\Notifications\ContactFormSend;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class SendContactFormListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\SendContactForm  $event
     * @return void
     */
    public function handle(SendContactForm $event)
    {
        $users = User::all();
     
        Notification::send($users, new ContactFormSend ($event->request->only(['email','name','message'])));
    }
}
