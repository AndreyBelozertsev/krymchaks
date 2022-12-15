<?php

namespace App\Models;

use App\Casts\Json;
use App\Traits\Files;
use App\Traits\Gallery;
use App\Traits\ScopeActive;
use App\Traits\HasThumbnail;
use App\Traits\DateForHumman;
use App\Traits\ResolveRouteBindingSlug;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Audio extends Model
{
    use HasFactory, Sluggable, ScopeActive, ResolveRouteBindingSlug, HasThumbnail, DateForHumman, Gallery, Files;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    protected function thumbnailDir():string
    {
        return 'audio';
    }


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
