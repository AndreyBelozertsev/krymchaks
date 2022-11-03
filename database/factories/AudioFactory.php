<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Audio>
 */
class AudioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->word(),
            'thumbnail' => fake()->imageUrl(640, 480),
            'description' => fake()->paragraph(),
            'content' => fake()->paragraph(),
            'files' => json_encode([$this->faker->fixturesFile('audio', 'files/audio' )])
        ];
    }
}
// $table->string('title');
// $table->string('slug')->unique();
// $table->string('thumbnail')->nullable();
// $table->text('images')->nullable();
// $table->text('description')->nullable();
// $table->text('content')->nullable();
// $table->text('files')->nullable();