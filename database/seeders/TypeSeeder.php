<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert(
            [
                [
                    'code' => 'CM',
                    'name' => 'Cours Magistral',
                ],
                [
                    'code' => 'TD',
                    'name' => 'Travaux Dirigés',
                ],
                [
                    'code' => 'TP',
                    'name' => 'Travaux Pratiques',
                ],
                [
                    'code' => 'DE',
                    'name' => 'Devoir',
                ],
                [
                    'code' => 'EN',
                    'name' => 'Examen',
                ],
                [
                    'code' => 'EE',
                    'name' => 'Exposé',
                ],
                [
                    'code' => 'PC',
                    'name' => 'Projet de classe',
                ],
                [
                    'code' => 'PFC',
                    'name' => 'Projet de fin de cycle',
                ],
                [
                    'code' => 'CD',
                    'name' => 'Correction Devoir',
                ],
                [
                    'code' => 'CE',
                    'name' => 'Correction Examen',
                ],
                [
                    'code' => 'CTP',
                    'name' => 'Correction Travaux Pratiques',
                ],
                [
                    'code' => 'CTD',
                    'name' => 'Correction Travaux Dirigés',
                ],
                [
                    'code' => 'S',
                    'name' => 'Suggestions',
                ],
            ]
        );
    }
}
