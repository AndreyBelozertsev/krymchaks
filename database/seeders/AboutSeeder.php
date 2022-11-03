<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\AboutType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        About::factory()
            ->count(100)
            ->create();
    }
}
