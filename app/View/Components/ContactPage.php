<?php

namespace App\View\Components;

use App\Models\Setting;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Cache;

class ContactPage extends Component
{

    public $organization;

    public $address;

    public $email;

    public $phone;

    public $telegram;

    public $work_time;

    public $vk;


    public function __construct()
    {
        $this->organization = $this->getValue('organization');
        $this->address = $this->getValue('address');
        $this->email = $this->getValue('email');
        $this->phone = $this->getValue('phone');
        $this->telegram = $this->getValue('telegram');
        $this->work_time = $this->getValue('work_time');
        $this->vk = $this->getValue('vk');
        
        
    }
    protected function getValue($field){
        $value = Cache::rememberForever("setting.contact.$field", function () use($field) {
            return Setting::where('key',$field)->select('value')->first();
         });
        if($value){
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
