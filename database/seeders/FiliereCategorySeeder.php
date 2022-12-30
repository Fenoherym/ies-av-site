<?php

namespace Database\Seeders;

use App\Models\FiliereCategory;
use Illuminate\Database\Seeder;

class FiliereCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filiere_categories = [
            [
                'name' => "Sciences de l'ingénieur",

            ],
            [
                'name' => 'Sciences de gestion',

            ],
            [
                'name' => "Sciences de l'environnement",
            ],

        ];

        foreach ($filiere_categories as $category) {
            FiliereCategory::create($category);
        }
    }
}
