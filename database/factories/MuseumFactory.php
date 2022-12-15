<?php

namespace Database\Factories;

use App\Traits\ImagesGeneration;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Museum>
 */
class MuseumFactory extends Factory
{
    use ImagesGeneration;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->word(),
            'thumbnail' => $this->faker->fixturesImage('museum','museum/' . date('Y/m/d') ),
            'description' => fake()->paragraph(),
            'images' => $this->imagesGeneration('about','about/'),
            'content' => fake()->paragraph(),
        ];
    }
}