<?php
namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;


trait DateForHumman
{

    protected function date(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => Carbon::parse($attributes['created_at'])->translatedFormat('d F, Y'),
        );
    }

}
