<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NiveauSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('niveaux')->insert(
            [
                [
                    'code' => 'CP',
                    'libelle' => 'Classe Préparatoire',
                ],
                [
                    'code' => 'L1',
                    'libelle' => 'Licence 1',
                ],
                [
                    'code' => 'BTS1',
                    'libelle' => 'BTS 1',
                ],
                [
                    'code' => 'BTS2',
                    'libelle' => 'BTS 2',
                ],
                [
                    'code' => 'L2',
                    'libelle' => 'Licence 2',
                ],
                [
                    'code' => 'L3',
                    'libelle' => 'Licence 3',
                ],
                [
                    'code' => 'M1',
                    'libelle' => 'Master 1',
                ],
                [
                    'code' => 'M2',
                    'libelle' => 'Master 2',
                ],
                [
                    'code' => 'T1',
                    'libelle' => 'Thèse 1',
                ],
                [
                    'code' => 'T2',
                    'libelle' => 'Thèse 2',
                ],
                [
                    'code' => 'T3',
                    'libelle' => 'Thèse 3',
                ],
            ]
        );
    }
}
