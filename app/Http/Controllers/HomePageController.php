<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Place;
use App\Models\AboutCategory;
use Illuminate\Http\Request;

class HomePageController extends Controller
{

    public function __invoke()
    {
        $mainPost = Post::active()->select(['id','title','slug','description','created_at'])->isFixed()->first();

        $posts = Post::active()->select(['id','title','slug','thumbnail','description','created_at'])->latest()->where('id', '!=', $mainPost ? $mainPost->id : null)->limit(5)->get();

        $categories = AboutCategory::active()->isFixed()->latest()->limit(6)->get();

        $places = Place::active()->get();

        return view('page.home',[
                                    'mainPost'=>$mainPost,
                                    'posts'=>$posts,
                                    'categories'=>$categories,
                                    'places'=> $places
                                ]);
    }
}
