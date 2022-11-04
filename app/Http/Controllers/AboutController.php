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
        $abouts = About::with('category')->active()->whereHas('category', function($q) use($category){
            $q->active()->where('id', $category->id);
        })->latest()->paginate(24);

        return view('page.about.index', compact('abouts'));

    }

    public function show($category,About $about)
    {   
        return view('page.about.show', compact('about') );
    }
}
