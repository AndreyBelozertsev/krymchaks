<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use App\Models\AboutCategory;
use Illuminate\Support\Facades\Cache;

class AboutCategoryController extends Controller
{
    public function show($category)
    {
        $category = Cache::rememberForever("about_category_$category", function () use($category) {
            return AboutCategory::where('slug', $category)
                ->select(['id','title','slug','content','created_at'])
                ->active()
                ->firstOrFail();
        });
        $abouts = About::with('category')
                        ->select(['title','thumbnail','slug','about_category_id','created_at'])
                        ->active()
                        ->whereHas('category', function($q) use($category){
                                $q->active()->where('id', $category->id);
                        })
                        ->latest()
                        ->limit(5)
                        ->get();
        return view('page.about-category.show', compact('abouts','category'));
    }
}
