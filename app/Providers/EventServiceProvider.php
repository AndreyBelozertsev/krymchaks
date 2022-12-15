<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use App\Models\Place;
use App\Models\Partner;
use App\Models\Navigation;
use App\Models\AboutCategory;
use App\Events\SendContactForm;
use App\Observers\PostObserver;
use App\Observers\UserObserver;
use App\Observers\PlaceObserver;
use App\Observers\PartnerObserver;
use App\Observers\NavigationObserver;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Observers\AboutCategoryObserver;
use App\Listeners\SendContactFormListener;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        SendContactForm::class => [
            SendContactFormListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        AboutCategory::observe(AboutCategoryObserver::class);
        Post::observe(PostObserver::class);
        Place::observe(PlaceObserver::class);
        Navigation::observe(NavigationObserver::class);
        Partner::observe(PartnerObserver::class);
        User::observe(UserObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
