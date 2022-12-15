<?php

namespace App\Observers;

use App\Models\Place;
use Illuminate\Support\Facades\Cache;

class PlaceObserver
{
    /**
    * Handle the AboutCategory "saved" event.
    *
    * @param  \App\Models\Place  $place
    * @return void
    */
   public function saved(Place $place)
   {
       Cache::forget('places');
   }
}
