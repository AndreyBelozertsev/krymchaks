<?php

namespace App\View\Components;

use App\Models\Place;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Cache;

class Map extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    protected const CENTER = '45.219165, 34.539327';

    public function __construct(protected $place = '')
    {
        //
    }

    protected function getData()
    {
        return $this->place 
            ? collect([$this->place])
                ->map(function ($value, $key) {
                    $value->thumbnail = $value->makeThumbnail('120xnull','resize');
                    return $value;
                })
            : Cache::rememberForever('places', function (){ 
                return Place::active()->select(['id','title','thumbnail','slug','description','coordinates'])->get()
                        ->map(function ($value, $key) {
                                $value->thumbnail = $value->makeThumbnail('120xnull','resize');
                                return $value;
                        });
                
            });
    }

    protected function getCenter()
    {
        return $this->place 
            ? $this->place->coordinates
            : self::CENTER;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.map',[ 'places' => $this->getData(),'center' => $this->getCenter()]);
    }
}
