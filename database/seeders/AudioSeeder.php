<?php

namespace Database\Seeders;

use App\Models\Audio;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Audio::factory()
            ->count(100)
            ->create();
    }
}
