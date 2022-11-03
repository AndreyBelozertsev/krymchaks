<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PrintedProduction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PrintedProductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PrintedProduction::factory()
            ->count(100)
            ->create();
    }
}
