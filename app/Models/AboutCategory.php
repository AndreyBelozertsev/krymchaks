<?php

namespace App\Models;

use App\Traits\ScopeActive;
use App\Traits\ScopeIsFixed;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AboutCategory extends Model
{
    use HasFactory, Sluggable, ScopeActive, ScopeIsFixed;

    public function abouts()
    {
        return $this->hasMany(About::class);
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
