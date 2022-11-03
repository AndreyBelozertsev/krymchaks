<?php

namespace Database\Factories;

use App\Models\AboutType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\About>
 */
class AboutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $type = AboutType::all()->random(1)->first();
      
        return [
            'title' => fake()->word(),
            'thumbnail' => fake()->imageUrl(640, 480),
            'description' => fake()->paragraph(),
            'about_type_id' => $type->id,
            'content' => fake()->paragraph(),
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
// $table->foreignIdFor(AboutType::class)
//         ->nullable()
//         ->constrained()
//         ->onUpdate('cascade')
//         ->nullOnDelete('cascade');
// $table->boolean('status')->default(true);
// $table->timestamps();