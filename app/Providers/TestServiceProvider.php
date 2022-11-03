<?php

namespace App\Providers;

use Faker\Factory;
use Faker\Generator;
use Illuminate\Support\ServiceProvider;
use App\Support\Testing\FakerFileProvider;
use App\Support\Testing\FakerImageProvider;


class TestServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register():void
    {
        $this->app->singleton(Generator::class, function(){
            $faker = Factory::create();
            $faker->addProvider(new FakerImageProvider($faker));
            $faker->addProvider(new FakerFileProvider($faker));
            return $faker;

        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}