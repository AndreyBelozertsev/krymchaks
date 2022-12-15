<?php

namespace Database\Factories;

use App\Models\AboutCategory;
use App\Traits\ImagesGeneration;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\About>
 */
class AboutFactory extends Factory
{
    use ImagesGeneration;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $type = AboutCategory::all()->random(1)->first();
      
        return [
            'title' => fake()->word(),
            'thumbnail' => $this->faker->fixturesImage('about','about/' . date('Y/m/d') ),
            'images' => $this->imagesGeneration('about','about/'),
            'description' => fake()->paragraph(),
            'about_category_id' => $type->id,
            'content' => fake()->paragraph(),
        ];
    }
}
//"[{\"url\":\"/storage\\/images\\/about\\/2022\\/12\\/06\\/c271d499-dcbd-3274-891b-e742e59445d0.jpg\",\"title\":\"\",\"desc\":\"\",\"orig\":\"\",\"filesize\":326233,\"ext\":\"jpg\",\"mime\":\"image\\/jpg\",\"mime_base\":\"image\",\"mime_detail\":\"jpg\"},{\"url\":\"/storage\\/images\\/about\\/2022\\/12\\/06\\/c271d499-dcbd-3274-891b-e742e59445d0.jpg\",\"title\":\"\",\"desc\":\"\",\"orig\":\"\",\"filesize\":532888,\"ext\":\"jpg\",\"mime\":\"image\\/jpg\",\"mime_base\":\"image\",\"mime_detail\":\"jpg\"},{\"url\":\"/storage\\/images\\/about\\/2022\\/12\\/06\\/c271d499-dcbd-3274-891b-e742e59445d0.jpg\",\"title\":\"\",\"desc\":\"\",\"orig\":\"\",\"filesize\":226474,\"ext\":\"jpg\",\"mime\":\"image\\/jpg\",\"mime_base\":\"image\",\"mime_detail\":\"jpeg\"}]"
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