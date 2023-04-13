<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Posts>
 */
class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'author_id' => fake()->numberBetween($min = 1, $max = 100) ,
            'subraddit_id' => fake()->numberBetween($min = 1, $max = 100),
            'title' => fake()->sentence() ,
            'content' => fake()->paragraph() , // password
            'crops' => fake()->numberBetween($min = 1, $max = 100000) ,
        ];
    }
}
