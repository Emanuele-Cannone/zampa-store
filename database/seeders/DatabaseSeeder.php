<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $animalTypologies = collect(['Cane','Coniglio','Gatto','Pesce','Uccello','Topo']);
        \App\Models\User::factory(1)->create();
        \App\Models\Cluster::factory(20)->create();
        \App\Models\Provider::factory(15)->create();
        \App\Models\Customer::factory(30)->create();
        $animalTypologies->each( function ($item) {
            \App\Models\AnimalTypology::create(['name' => $item]);
        });
//         \App\Models\AnimalTypology::factory(5)->create();
         \App\Models\Breed::factory(20)->create();
         \App\Models\Animal::factory(40)->create();

        // \App\Models\AnimalTypology::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
