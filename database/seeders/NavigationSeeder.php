<?php

namespace Database\Seeders;

use App\Models\Navigation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NavigationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'title' => 'О нас',
                'type' => 'top',
                'status' => 1
            ],
            [
                'title' => 'Музей',
                'url' => '/museum',
                'type' => 'top',
                'status' => 1
            ],
            [
                'title' => 'Медиа',
                'type' => 'top',
                'status' => 1
            ],
            [
                'title' => 'Печатная продукция',
                'url' => route('printed-productions.index'),
                'type' => 'top',
                'status' => 1
            ],
            [
                'title' => 'Новости',
                'url' => route('posts'),
                'type' => 'top',
                'status' => 1
            ],
            [
                'title' => 'Объекты',
                'url' => '/places',
                'type' => 'top',
                'status' => 1
            ],
            [
                'title' => 'Контакты',
                'url' => route('contact.index'),
                'type' => 'top',
                'status' => 1
            ],
            [
                'title' => 'История',
                'url' => route('about.category.index',['category'=>'istoriya']),
                'type' => 'top',
                'navigation_id' => 1,
                'status' => 1
            ],
            [
                'title' => 'Культура',
                'url' => route('about.category.index',['category'=>'kultura']),
                'type' => 'top',
                'navigation_id' => 1,
                'status' => 1
            ],
            [
                'title' => 'Кухня',
                'url' => route('about.category.index',['category'=>'kuhnya']),
                'type' => 'top',
                'navigation_id' => 1,
                'status' => 1
            ],
            [
                'title' => 'Религия',
                'url' => route('about.category.index',['category'=>'religiya']),
                'type' => 'top',
                'navigation_id' => 1,
                'status' => 1
            ],
            [
                'title' => 'Традиции',
                'url' => route('about.category.index',['category'=>'tradicii']),
                'type' => 'top',
                'navigation_id' => 1,
                'status' => 1
            ],
            [
                'title' => 'Просветители',
                'url' => route('about.category.index',['category'=>'prosvetiteli']),
                'type' => 'top',
                'navigation_id' => 1,
                'status' => 1
            ],
            [
                'title' => 'Общество',
                'url' => route('about.category.index',['category'=>'obshchestvo']),
                'type' => 'top',
                'navigation_id' => 1,
                'status' => 1
            ],
            [
                'title' => 'Аудио',
                'url' => route('media.audios.index'),
                'type' => 'top',
                'navigation_id' => 3,
                'status' => 1
            ],
            [
                'title' => 'Видео',
                'url' => route('media.videos.index'),
                'type' => 'top',
                'navigation_id' => 3,
                'status' => 1
            ]
        ];
        

        foreach($items as $item){
            Navigation::updateOrCreate(
                $item
            );
        }
    }
}
