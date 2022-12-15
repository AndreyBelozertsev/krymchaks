<?php

namespace App\Observers;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SettingObserver
{
    /**
     * Handle the Setting "saved" event.
     *
     * @param  \App\Models\Setting  $setting
     * @return void
     */
    public function saved(Setting $setting){
        Cache::forget("setting.contact.$setting->key");
    }

}
