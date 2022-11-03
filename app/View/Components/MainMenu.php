<?php

namespace App\View\Components;

use App\Models\AboutType;
use Illuminate\View\Component;

class MainMenu extends Component
{

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $aboutTypes = AboutType::active()->get();
        return view('components.main-menu',['aboutTypes'=> $aboutTypes]);
    }
}
