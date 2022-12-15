<?php

namespace Database\Seeders;

use App\Models\Museum;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MuseumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Museum::factory()
            ->count(50)
            ->create();
    }
}
