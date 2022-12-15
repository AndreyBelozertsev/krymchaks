<?php

namespace Database\Seeders;

use App\Models\PostCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $categories = [
            [
                'title' => 'Наши издания'
            ],
            [
                'title' => 'Наши мероприятия'
            ]
        ];
       

        foreach($categories as $category){
            PostCategory::updateOrCreate(
                $category
            );
        }
    }
}
