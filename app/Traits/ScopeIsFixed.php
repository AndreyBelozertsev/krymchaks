<?php

namespace App\Traits;

trait ScopeIsFixed
{
    public function scopeIsFixed($query)
    {
        return $query->where('is_fixed',1);
    }
}
