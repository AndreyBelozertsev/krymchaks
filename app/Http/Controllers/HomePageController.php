<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Place;
use Illuminate\Http\Request;
use App\Models\AboutCategory;
use Illuminate\Support\Facades\Cache;

class HomePageController extends Controller
{

    public function __invoke()
    {
        $mainPost = Cache::rememberForever('main_post_home_page', function () {
            return Post::active()->select(['id','title','slug','thumbnail','post_category_id','created_at'])->with('category')->isFixed()->first();
        });

        $posts = Cache::rememberForever('posts_home_page', function () use($mainPost) { 
            return Post::active()->select(['id','title','slug','thumbnail','post_category_id','created_at'])->latest()->where('id', '!=', $mainPost ? $mainPost->id : null)->with('category')->limit(4)->get();
        });

        $categories = Cache::rememberForever('about_categories_home_page', function (){ 
            return AboutCategory::active()->select(['id','title','slug','description'])->isFixed()->latest()->limit(6)->get();
        });

        return view('page.home',[
                                    'mainPost'=>$mainPost,
                                    'posts'=>$posts,
                                    'categories'=>$categories
                                ]);
    }
}
