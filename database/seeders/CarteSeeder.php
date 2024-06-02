<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Carte;

class CarteSeeder extends Seeder
{
    public function run()
    {
        Carte::factory(10)->create();
    }
}
