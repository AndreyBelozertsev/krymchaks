<?php

namespace App\Http\Controllers;

use App\Models\Museum;
use Illuminate\Http\Request;

class MuseumController extends Controller
{
    public function index()
    {
        
        $museums = Museum::select(['title','slug','thumbnail','description','created_at'])->active()->latest()->paginate(24);

        return view('page.museum.index', compact('museums'));

    }

    public function show(Museum $museum)
    {   
        return view('page.museum.show', compact('museum') );
    }
}
