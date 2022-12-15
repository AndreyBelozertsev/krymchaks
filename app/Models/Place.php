<?php

namespace App\Models;

use App\Traits\Gallery;
use App\Traits\ScopeActive;
use App\Traits\HasThumbnail;
use App\Traits\ResolveRouteBindingSlug;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Place extends Model
{
    use HasFactory, Sluggable, ScopeActive, ResolveRouteBindingSlug, HasThumbnail, Gallery;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected function thumbnailDir():string
    {
        return 'place';
    }

}
