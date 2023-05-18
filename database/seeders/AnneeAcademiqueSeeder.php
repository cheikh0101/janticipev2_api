<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnneeAcademiqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('annee_academiques')->insert(
            [
                [
                    'libelle' => '2018-2019',
                    'code' => '18-19',
                    'annee_debut' => '2018-01-01',
                    'annee_fin' => '2019-01-01',
                ],
                [
                    'libelle' => '2019-2020',
                    'code' => '19-20',
                    'annee_debut' => '2019-01-01',
                    'annee_fin' => '2020-01-01',
                ],
                [
                    'libelle' => '2020-2021',
                    'code' => '20-21',
                    'annee_debut' => '2020-01-01',
                    'annee_fin' => '2021-01-01',
                ],
                [
                    'libelle' => '2021-2022',
                    'code' => '21-22',
                    'annee_debut' => '2021-01-01',
                    'annee_fin' => '2022-01-01',
                ],
            ]
        );
    }
}
