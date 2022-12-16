<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ContactsButtom extends ContactPage
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.contacts-buttom', ['contacts_buttom'=> $this]);
    }
}
