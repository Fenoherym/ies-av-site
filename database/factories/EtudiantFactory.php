<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EtudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'numInscription' => $this->faker->word,
            'datebirth' => $this->faker->date,
            'adress' => $this->faker->address,
            'telephone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email,
            'photoUrl' => 'https://via.placeholder.com/150x150',
            'parcours_id' => random_int(1, 4),
            'niveau_id' => random_int(1, 5),
            'annee_scolaire_id' => 1,
        ];
    }
}
