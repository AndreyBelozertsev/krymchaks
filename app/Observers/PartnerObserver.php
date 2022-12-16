<?php

namespace App\Observers;

use App\Models\Partner;
use Illuminate\Support\Facades\Cache;

class PartnerObserver
{
    /**
    * Handle the Partner "saved" event.
    *
    * @param  \App\Models\Partner  $partner
    * @return void
    */
    public function saved(Partner $partner)
    {
        Cache::forget('partners');
    }


    /**
     * Handle the Partner "deleted" event.
     *
     * @param  \App\Models\Partner  $partner
     * @return void
     */
    public function deleted(Partner $partner)
    {
        Cache::forget('partners');
    }
}
