<?php

namespace Database\Factories;

use App\Traits\ImagesGeneration;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PrintedProduction>
 */
class PrintedProductionFactory extends Factory
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
            'thumbnail' => $this->faker->fixturesImage('printed-production','printed-production/' . date('Y/m/d') ),
            'images' => $this->imagesGeneration('about','about/'),
            'description' => fake()->paragraph(),
            'content' => fake()->paragraph(),
            //'files' => json_encode([$this->faker->fixturesFile('paper', 'files/printed-production' )])
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
// $table->boolean('status')->default(true);
// $table->timestamps();