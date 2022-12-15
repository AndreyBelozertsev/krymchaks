<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function index()
    {
        return view('page.place.index');
    }

    public function show(Place $place)
    {
        return view('page.place.show', compact('place') );
    }
}
