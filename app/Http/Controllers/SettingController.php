<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\SendContactForm as SendContactFormEvent;
use App\Http\Requests\SendContactForm;

class SettingController extends Controller
{
    public function contactIndex()
    {
        return view('page.contact');
    }

    public function sendForm(SendContactForm $request)
    {
        event(new SendContactFormEvent($request));
    }
}
