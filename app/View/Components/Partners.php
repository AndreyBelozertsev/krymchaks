<?php

namespace App\View\Components;


use App\Models\Partner;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Cache;

class Partners extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $items = Cache::rememberForever('partners', function () {
            return Partner::active()->orderBy('sort')->limit(3)->get();
        });
        return view('components.partners', ['items'=> $items]);
    }
}
