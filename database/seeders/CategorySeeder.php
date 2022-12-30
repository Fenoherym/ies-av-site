<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Information',

            ],
            [
                'name' => 'Projet des étudiants',

            ],
            [
                'name' => 'Evenements',

            ],

        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
