<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Factor;

class FactorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Factor::create([
            'name' => 'projekt',
            'label' => 'Projekt',
            'price' => 1000,
            'editable' => true
        ]);

        Factor::create([
            'name' => 'uziemienie',
            'label' => 'Pełna ochrona - Uziemienie',
            'price' => 1000,
            'editable' => true
        ]);

        Factor::create([
            'name' => 'acdc',
            'label' => 'Pełna ochrona AC/DC',
            'price' => 1000,
            'editable' => true
        ]);

        Factor::create([
            'name' => 'cena_pradu',
            'label' => 'Cena prądu',
            'price' => 0.75,
            'editable' => true
        ]);

        Factor::create([
            'name' => 'cena_65',
            'label' => 'Dopłata powyżej 6,5 kWp',
            'price' => 1500,
            'editable' => false
        ]);

        Factor::create([
            'name' => 'perfect_power',
            'label' => 'Współczynnik idealnej mocy PV',
            'price' => 0.8,
            'editable' => true
        ]);

        Factor::create([
            'name' => 'dotacja',
            'label' => 'Dotacja',
            'price' => 5000,
            'editable' => false
        ]);

        Factor::create([
            'name' => 'ulga',
            'label' => 'Ulga 17%',
            'price' => 17,
            'editable' => false
        ]);
    }
}
