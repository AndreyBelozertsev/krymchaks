<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Partner>
 */
class PartnerFactory extends Factory
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
            'url' => 'https://vk.com',
            'thumbnail' => fake()->imageUrl(640, 480),
            'description' => fake()->paragraph(),
            'content' => fake()->paragraph(),
        ];
    }
}


// $table->id();
// $table->string('title');
// $table->string('url')->nullable();
// $table->string('thumbnail')->nullable();
// $table->boolean('status')->default(true);
// $table->timestamps();