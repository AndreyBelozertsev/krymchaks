<?php

namespace App\Http\Controllers;

use App\Models\Audio;
use Illuminate\Http\Request;

class AudioController extends Controller
{
    public function index()
    {
        $audios = Audio::active()->latest()->paginate(24);

        return view('page.media.audio.index', compact('audios'));
    }

    public function show(Audio $audio)
    {
        return view('page.media.audio.show', compact('audio') );
    }
}
