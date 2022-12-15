<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutCategory;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index($category)
    {
        $category = AboutCategory::where('slug', $category)->active()->firstOrFail();
        $abouts = About::with('category')->select(['title','slug','thumbnail','description','created_at','about_category_id'])->active()->whereHas('category', function($q) use($category){
            $q->active()->where('id', $category->id);
        })->latest()->paginate(24);

        return view('page.about.index', compact('abouts','category'));

    }

    public function show($category,About $about)
    {   
        abort_if($about->category->slug != $category, 404 );
        $abouts = About::select(['title','slug','created_at','about_category_id'])->active()->whereHas('category', function($q) use($category){
            $q->active()->where('slug', $category);
        })->where('id', '!=',$about->id)->latest()->limit(5)->get();
        $category = $about->category;
        return view('page.about.show', compact('about', 'abouts','category') );
    }
}
