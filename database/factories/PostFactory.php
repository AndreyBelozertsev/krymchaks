<?php

namespace Database\Factories;

use App\Traits\ImagesGeneration;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
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
            'thumbnail' => $this->faker->fixturesImage('post','post/' . date('Y/m/d') ),
            'images' => $this->imagesGeneration('about','about/'),
            'description' => fake()->paragraph(),
            'is_fixed' => rand(0,1),
            'content' => fake()->paragraph(),
            'created_at' => fake()->dateTimeBetween('-1 week', '+1 week')
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
// $table->boolean('status')->default(true);
// $table->timestamps();