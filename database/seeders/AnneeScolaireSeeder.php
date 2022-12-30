<?php

namespace Database\Seeders;

use App\Models\AnneeScolaire;
use Illuminate\Database\Seeder;

class AnneeScolaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $annees = [
            [
                'name' => '2020-2021',
                'isActive' => 1
            ],
            [
                'name' => '2021-2022',
                'isActive' => 0
            ],
            [
                'name' => '2022-2023',
                'isActive' => 0
            ],

        ];

        foreach ($annees as $annee) {
             AnneeScolaire::create($annee);
        }
    }
}
