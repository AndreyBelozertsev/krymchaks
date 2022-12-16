<?php

namespace App\Observers;

use App\Models\AboutCategory;
use Illuminate\Support\Facades\Cache;

class AboutCategoryObserver
{
    /**
     * Handle the AboutCategory "saved" event.
     *
     * @param  \App\Models\AboutCategory  $aboutCategory
     * @return void
     */
    public function saved(AboutCategory $aboutCategory)
    {
        Cache::forget("about_category_$aboutCategory->slug");
        Cache::forget('about_categories_home_page');
    }
    
    /**
     * Handle the AboutCategory "deleted" event.
     *
     * @param  \App\Models\AboutCategory  $aboutCategory
     * @return void
     */
    public function deleted(AboutCategory $aboutCategory)
    {
        Cache::forget("about_category_$aboutCategory->slug");
        Cache::forget('about_categories_home_page');
    }

}
