<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;

class PostObserver
{
    /**
     * Handle the Post "saving" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function saving(Post $post)
    {
        if($post->is_fixed){
            Post::where('is_fixed',1)->update(['is_fixed'=>0]);
        }
    }

    public function saved(Post $post){
        Cache::forget('main_post_home_page');
        Cache::forget('posts_home_page');
    }

}
