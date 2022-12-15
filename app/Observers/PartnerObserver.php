<?php

namespace App\Observers;

use App\Models\Partner;
use Illuminate\Support\Facades\Cache;

class PartnerObserver
{
    /**
    * Handle the AboutCategory "saved" event.
    *
    * @param  \App\Models\Partner  $partner
    * @return void
    */
    public function saved(Partner $partner)
    {
        Cache::forget('partners');
    }
}
