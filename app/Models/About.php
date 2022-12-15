<?php

namespace App\Models;

use App\Traits\Gallery;
use App\Traits\ScopeActive;
use App\Traits\HasThumbnail;
use App\Models\AboutCategory;
use App\Traits\DateForHumman;
use App\Traits\ResolveRouteBindingSlug;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class About extends Model
{
    use HasFactory, Sluggable, ScopeActive, ResolveRouteBindingSlug, HasThumbnail, DateForHumman, Gallery;


    public function category()
    {
        return $this->belongsTo(AboutCategory::class, 'about_category_id', 'id');
    }

    protected function thumbnailDir():string
    {
        return 'about';
    }

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
}
