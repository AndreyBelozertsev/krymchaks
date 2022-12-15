<?php

namespace Database\Factories;

use App\Traits\ImagesGeneration;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Object>
 */
class PlaceFactory extends Factory
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
            'thumbnail' => $this->faker->fixturesImage('place','place/' . date('Y/m/d') ),
            'images' => $this->imagesGeneration('place','place/'),
            'description' => fake()->paragraph(),
            'content' => fake()->paragraph(),
            'coordinates' => $this->faker->latitude(44, 46) . ',' .$this->faker->longitude(33, 36)
        ];
    }
}

// $table->id();
// $table->string('title');
// $table->string('slug')->unique();
// $table->string('thumbnail')->nullable();
// $table->text('images')->nullable();
// $table->text('description')->nullable();
// $table->text('content')->nullable();
// $table->string('coordinates');
// $table->timestamps();