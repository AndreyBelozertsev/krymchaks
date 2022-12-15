<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function index()
    {
        $posts = Post::active()->select(['title','slug','thumbnail','description','created_at','post_category_id'])->with('category')->latest()->paginate(24);

        return view('page.post.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('page.post.show', compact('post') );
    }
}
