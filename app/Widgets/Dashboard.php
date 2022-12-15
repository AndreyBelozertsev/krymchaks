<?php

namespace App\Widgets;
use App\Models\Post;
use App\Models\About;


use App\Models\Audio;
use App\Models\Place;
use App\Models\Video;
use App\Models\Museum;
use App\Models\PrintedProduction;
use SleepingOwl\Admin\Widgets\Widget;

class Dashboard extends Widget
{

    /**
     * Если метод вернет false, блок не будет помещен в шаблон
     * Данный метод не обязателен
     *
     * @return boolean
     */
    public function active()
    {
        return true;
    }

    /**
     * При помещении в один блок нескольких виджетов они будут выведены в порядке их позиции
     * Данный метод не обязателен
     *
     * @return integer
     */
    public function position()
    {
        return 0;
    }

    /**
     * HTML который необходимо поместить
     *
     * @return string
     */
    public function toHtml()
    {   
        $about = About::all()->count();
        $audio = Audio::all()->count();
        $museum = Museum::all()->count();
        $place = Place::all()->count();
        $post = Post::all()->count();
        $printed_production = PrintedProduction::all()->count();
        $video = Video::all()->count();
       
        return view('default.dashboard',compact('about','audio','museum','place','post','printed_production','video'))->render();
        
    }

    /**
     * Путь до шаблона, в который добавляем
     *
     * @return string|array
     */
    public function template()
    {
        // AdminTemplate::getViewPath('dashboard') == 'sleepingowl:default.dashboard'
        return \AdminTemplate::getViewPath('dashboard');
    }

    /**
     * Блок в шаблоне, куда помещаем
     *
     * @return string
     */
    public function block()
    {
        return 'block.content';
    }
}
