<?php

namespace Database\Factories;

use App\Traits\ImagesGeneration;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Audio>
 */
class AudioFactory extends Factory
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
            'thumbnail' => $this->faker->fixturesImage('media/audio','audio/' . date('Y/m/d') ),
            'description' => fake()->paragraph(),
            'images' => $this->imagesGeneration('about','about/'),
            'content' => fake()->paragraph(),
            //'files' => json_encode([$this->faker->fixturesFile('audio', 'audio' )])
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