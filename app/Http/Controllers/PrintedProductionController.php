<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrintedProduction;

class PrintedProductionController extends Controller
{
    public function index()
    {
        $products = PrintedProduction::active()->latest()->paginate(24);

        return view('page.printed-production.index', compact('products'));
    }

    public function show(PrintedProduction $product)
    {
        return view('page.printed-production.show', compact('product') );
    }
}
