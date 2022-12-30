<?php

namespace Database\Seeders;

use App\Models\FiliereCategory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategorySeeder::class);
        \App\Models\Blog::factory(50)->create();
        $this->call(NiveauSeeder::class);
        $this->call(RoleSeeder::class);
        \App\Models\User::factory(4)->create();
        $this->call(FiliereCategorySeeder::class);
        $this->call(FiliereSeeder::class);
        $this->call(ParcoursSeeder::class);
        $this->call(AnneeScolaireSeeder::class);
        \App\Models\Tranche::factory(100)->create();
        \App\Models\Enseignant::factory(20)->create();

    }
}
