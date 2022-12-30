<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TrancheFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'isDroitOk' => false,
            'isFirstTrancheOk' => false,
            'isSecondTrancheOk' => false,
            'isThirdTrancheOk' => false,
            'isThirdTrancheOk' => false,
            'etudiant_id' => \App\Models\Etudiant::factory()->create()->id
        ];
    }
}
