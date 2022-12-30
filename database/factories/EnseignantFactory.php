<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EnseignantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'adress' => $this->faker->address,
            'telephone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'photoUrl' => 'https://via.placeholder.com/150x150',
            'filiere_id' => random_int(1, 3),
            'isChefMention' => false
        ];
    }
}
