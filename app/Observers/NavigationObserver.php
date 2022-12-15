<?php

namespace App\Observers;

use App\Models\Navigation;
use Illuminate\Support\Facades\Cache;

class NavigationObserver
{
    /**
     * Handle the Navigation "saved" event.
     *
     * @param  \App\Models\Navigation  $navigation
     * @return void
     */
    public function saved(Navigation  $navigation)
    {
        Cache::forget('navigation_menu');
    }
}
