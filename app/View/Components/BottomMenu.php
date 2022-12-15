<?php

namespace App\View\Components;

use App\Models\Navigation;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Cache;

class BottomMenu extends Component
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
        $items = Cache::rememberForever('navigation_menu', function () {
            return Navigation::active()->where('navigation_id',null)->with('child')->orderBy('sort')->get();
        });
        return view('components.bottom-menu',['items'=>$items]);
    }
}
