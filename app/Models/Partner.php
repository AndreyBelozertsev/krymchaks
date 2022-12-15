<?php

namespace App\Models;

use App\Traits\ScopeActive;
use App\Traits\HasThumbnail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Partner extends Model
{
    use HasFactory, ScopeActive, HasThumbnail;

    protected function thumbnailDir():string
    {
        return 'partners';
    }
}
