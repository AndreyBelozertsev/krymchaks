<?php

namespace App\View\Components;

use App\Models\Setting;
use Illuminate\View\Component;

class ContactPage extends Component
{

    public $organization;

    public $address;

    public $email;

    public $phone;

    public $telegram;

    public $viber;

    public $vk;


    public function __construct()
    {
        $this->organization = $this->getValue('organization');
        $this->email = $this->getValue('email');
        $this->phone = $this->getValue('phone');
        $this->telegram = $this->getValue('telegram');
        $this->viber = $this->getValue('viber');
        $this->vk = $this->getValue('vk');
        
        
    }
    protected function getValue($field){
        if($value = Setting::where('key',$field)->select('value')->first()){
            return $value->value;
        }
        return null;
    }
 

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.contact-page', ['contacts'=> $this]);
    }
}
