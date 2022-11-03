<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AboutType>
 */
class AboutTypeFactory extends Factory
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
            'content' => fake()->paragraph(),
        ];
    }
}
// $table->id();
// $table->string('title');
// $table->string('slug')->unique();
//$table->boolean('status')->default(true);
// $table->timestamps();