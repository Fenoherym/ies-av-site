<?php

namespace Database\Seeders;

use App\Models\Niveau;
use Illuminate\Database\Seeder;

class NiveauSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $niveaux = [
            [
           'name' => 'L1',
       ],
       [
           'name' => 'L2',
       ],
       [
           'name' => 'L3',
       ],
       [
           'name' => "M1",
       ],
       [
           'name' => "M2",
       ]
       ];

       foreach ($niveaux as $niveau) {
           Niveau::create($niveau);
       }

    }
}
