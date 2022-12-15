<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::active()->latest()->paginate(24);

        return view('page.media.video.index', compact('videos'));
    }

    public function show(Video $video)
    {
        return view('page.media.video.show', compact('video') );
    }
}
