<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(10, true),
            'img_url' => 'https://via.placeholder.com/700x500',
            'category_id' => random_int(1,3)
        ];
    }
}
