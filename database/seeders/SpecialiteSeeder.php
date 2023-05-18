<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecialiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specialites')->insert(
            [
                [
                    'code' => 'TC',
                    'libelle' => 'Informatique',
                ],
                [
                    'code' => 'GL',
                    'libelle' => 'Génie Logiciel',
                ],
                [
                    'code' => 'RT',
                    'libelle' => 'Réseau et Télécom',
                ],
            ]
        );
    }
}
