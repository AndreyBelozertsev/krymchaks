<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            AboutTypeSeeder::class,
            AboutSeeder::class,
            AudioSeeder::class,
            PlaceSeeder::class,
            PostSeeder::class,
            PrintedProductionSeeder::class,
            SettingSeeder::class,
            VideoSeeder::class
        ]);
    }
}
