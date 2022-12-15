<?php

namespace Database\Factories;

use App\Traits\ImagesGeneration;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
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
            'thumbnail' => $this->faker->fixturesImage('media/video','video/' . date('Y/m/d') ),
            'images' => $this->imagesGeneration('about','about/'),
            'description' => fake()->paragraph(),
            'content' => fake()->paragraph(),
            //'files' => json_encode([$this->faker->fixturesFile('video', 'video' )])
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
// $table->text('files')->nullable();
// $table->timestamps();