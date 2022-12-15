<?php

namespace App\Providers;

use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

use App\Admin\Form\StreetMap;
use AdminFormElement;

class AdminSectionsServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $sections = [
        \App\Models\About::class => 'App\Http\Sections\About',
        \App\Models\AboutCategory::class => 'App\Http\Sections\AboutCategory',
        \App\Models\Audio::class => 'App\Http\Sections\Audio',
        \App\Models\Museum::class => 'App\Http\Sections\Museum',
        \App\Models\Navigation::class => 'App\Http\Sections\Navigation',
        \App\Models\Partner::class => 'App\Http\Sections\Partner',
        \App\Models\Place::class => 'App\Http\Sections\Place',
        \App\Models\Post::class => 'App\Http\Sections\Post',
        \App\Models\PostCategory::class => 'App\Http\Sections\PostCategory',
        \App\Models\PrintedProduction::class => 'App\Http\Sections\PrintedProduction',
        \App\Models\Setting::class => 'App\Http\Sections\Setting',
        \App\Models\User::class => 'App\Http\Sections\Users',
        \App\Models\Video::class => 'App\Http\Sections\Video',
    ];
    protected $widgets = [
        \App\Widgets\Logout::class,
        \App\Widgets\Dashboard::class,
    ];
    
    /*
     * Register sections.
     *
     * @param \SleepingOwl\Admin\Admin $admin
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
         // Регистрация виджетов в реестре
        /** @var WidgetsRegistryInterface $widgetsRegistry */
        $widgetsRegistry = $this->app[\SleepingOwl\Admin\Contracts\Widgets\WidgetsRegistryInterface::class];
 
        foreach ($this->widgets as $widget) {
            $widgetsRegistry->registerWidget($widget);
        }

        $this->app->call([$this, 'registerNavigation']);

        parent::boot($admin);

        AdminFormElement::bind('streetmap', StreetMap::class);
    }

    public function registerNavigation()
    {
    
    }
}
