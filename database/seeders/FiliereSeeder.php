<?php

namespace Database\Seeders;

use App\Models\Filiere;
use Illuminate\Database\Seeder;

class FiliereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mentions = [
            [
                'name' => 'Télécommunication',
                'description' => " lorem lirep ipsum",
                'filiere_category_id' => 1,
            ],
            [
                'name' => 'Génie Rurale',
                'description' => " lorem lirep ipsum",
                'filiere_category_id' => 3,
            ],
            [
                'name' => 'Gestion',
                'description' => " lorem lirep ipsum",
                'filiere_category_id' => 2,
            ],

        ];

        foreach ($mentions as $mention) {
            Filiere::create($mention);
        }
    }
}
