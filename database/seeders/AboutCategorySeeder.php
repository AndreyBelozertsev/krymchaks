<?php

namespace Database\Seeders;

use App\Models\AboutCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AboutCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'title' => 'История',
                'description' => fake()->paragraph(),
                'content' => fake()->paragraph(),
                'is_fixed' => 1
            ],
            [
                'title' => 'Культура',
                'description' => fake()->paragraph(),
                'content' => fake()->paragraph(),
                'is_fixed' => 1
            ],
            [
                'title' => 'Кухня',
                'description' => fake()->paragraph(),
                'content' => fake()->paragraph(),
                'is_fixed' => 1
            ],
            [
                'title' => 'Религия',
                'description' => fake()->paragraph(),
                'content' => fake()->paragraph(),
                'is_fixed' => 1
            ],
            [
                'title' => 'Традиции',
                'description' => fake()->paragraph(),
                'content' => fake()->paragraph(),
                'is_fixed' => 1
            ],
            [
                'title' => 'Просветители',
                'description' => fake()->paragraph(),
                'content' => fake()->paragraph(),
                'is_fixed' => 1
            ],
            [
                'title' => 'Общество',
                'description' => fake()->paragraph(),
                'content' => fake()->paragraph(),
                'is_fixed' => 1
            ]
        ];
       

        foreach($categories as $category){
            AboutCategory::updateOrCreate(
                $category
            );
        }
        
    }
}
