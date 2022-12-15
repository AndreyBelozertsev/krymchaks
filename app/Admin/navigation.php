<?php

use SleepingOwl\Admin\Navigation\Page;

// Default check access logic
// AdminNavigation::setAccessLogic(function(Page $page) {
// 	   return auth()->user()->isSuperAdmin();
// });
//
// AdminNavigation::addPage(\App\User::class)->setTitle('test')->setPages(function(Page $page) {
// 	  $page
//		  ->addPage()
//	  	  ->setTitle('Dashboard')
//		  ->setUrl(route('admin.dashboard'))
//		  ->setPriority(100);
//
//	  $page->addPage(\App\User::class);
// });
//
// // or
//
// AdminSection::addMenuPage(\App\User::class)

return [

    [
        'title' => 'Новости',
        'icon' => 'fa fa-newspaper',
        'priority'    => 100,
        'pages' => [
            (new Page(\App\Models\Post::class))
                ->setPriority(0),
            (new Page(\App\Models\PostCategory::class))
                ->setPriority(100)
        ]
    ],
    [
        'title' => 'О нас',
        'icon' => 'fa fa-address-book',
        'priority'    => 200,
        'pages' => [
            (new Page(\App\Models\About::class))
                ->setPriority(0),
            (new Page(\App\Models\AboutCategory::class))
                ->setPriority(100)
        ]
    ],
    [
        'title' => 'Медиа',
        'icon' => 'fa fa-play-circle',
        'priority'    => 300,
        'pages' => [
            (new Page(\App\Models\Audio::class))
                ->setPriority(0),
            (new Page(\App\Models\Video::class))
                ->setPriority(100)
        ]
    ],
    [
        'title' => 'Настройки',
        'icon' => 'fa fa-cogs',
        'priority'    => 700,
        'pages' => [
            (new Page(\App\Models\Setting::class))
                ->setPriority(0),
            (new Page(\App\Models\Navigation::class))
                ->setPriority(100),
            (new Page(\App\Models\User::class))
                ->setPriority(100)
            
        ]
    ],
];


    // Examples
    // [
    //    'title' => 'Content',
    //    'pages' => [
    //
    //        \App\User::class,
    //
    //        // or
    //
    //        (new Page(\App\User::class))
    //            ->setPriority(100)
    //            ->setIcon('fas fa-users')
    //            ->setUrl('users')
    //            ->setAccessLogic(function (Page $page) {
    //                return auth()->user()->isSuperAdmin();
    //            }),
    //
    //        // or
    //
    //        new Page([
    //            'title'    => 'News',
    //            'priority' => 200,
    //            'model'    => \App\News::class
    //        ]),
    //
    //        // or
    //        (new Page(/* ... */))->setPages(function (Page $page) {
    //            $page->addPage([
    //                'title'    => 'Blog',
    //                'priority' => 100,
    //                'model'    => \App\Blog::class
	//		      ));
    //
	//		      $page->addPage(\App\Blog::class);
    //	      }),
    //
    //        // or
    //
        //    [
        //        'title'       => 'News',
        //        'priority'    => 300,
        //        'accessLogic' => function ($page) {
        //            return $page->isActive();
    	// 	      },
        //        'pages'       => [
    
        //            // ...
    
        //        ]
        //    ]
    //    ]
    // ]
