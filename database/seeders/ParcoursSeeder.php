<?php

namespace Database\Seeders;

use App\Models\Parcours;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ParcoursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $factory = new Factory();

        $parcours_data = [
            [
                'name' => 'Réseaux et Système',
                'description' => 'lorem description',
                'filiere_id' => 1,
            ],
            [
                'name' => 'Radiocommunication',
                'description' => 'lorem description',
                'filiere_id' => 1,
            ],
            [
                'name' => 'GEO-ENERGIE',
                'description' => 'lorem description',
                'filiere_id' => 2,
            ],
            [
                'name' => 'BIOLOGIE',
                'description' => 'lorem description',
                'filiere_id' => 3,
            ],
        ];

        foreach ($parcours_data as $parcours) {
            Parcours::create($parcours);
        }
    }
}
