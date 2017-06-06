<?php

use Illuminate\Database\Seeder;
use \App\Models\Sexe;
class SexesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sexe::create([
            'libelle_fr' => 'Masculin',
            'libelle_en' => 'Male',
            'code' => 'M'
        ]);
        Sexe::create([
            'libelle_fr' => 'Féminin',
            'libelle_en' => 'Female',
            'code' => 'F'
        ]);
    }
}
