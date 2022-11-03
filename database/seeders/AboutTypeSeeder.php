<?php

namespace Database\Seeders;

use App\Models\AboutType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AboutTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'title' => 'Тадиции',
                'content' => fake()->paragraph(),
                'is_fixed' => rand(0,1)
            ],
            [
                'title' => 'Кухня',
                'content' => fake()->paragraph(),
                'is_fixed' => rand(0,1)
            ],
            [
                'title' => 'Религия',
                'content' => fake()->paragraph(),
                'is_fixed' => rand(0,1)
            ]
        ];

        foreach($types as $type){
            AboutType::updateOrCreate(
                $type
            );
        }

        
        
    }
}
