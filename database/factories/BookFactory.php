<?php

namespace Database\Factories;

use App\Models\Genre;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "title" => $this->faker->word(),
            "author" => $this->faker->firstName(),
            "description" => $this->faker->sentence(),
            "name" => $this->faker->slug(),
            "user_id" => User::factory(),
            "genre_id" => Genre::factory(),

        ];
    }
}
