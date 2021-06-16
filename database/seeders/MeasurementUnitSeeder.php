<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MeasurementUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('measurement_units')
            ->insert([
                [
                    'name' => 'Servicio',
                    'acronyms' => 'sv',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'Cajas',
                    'acronym' => 'cj',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'Gramos',
                    'acronym' => 'gm',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'Galones',
                    'acronym' => 'gl',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'Kilos',
                    'acronym' => 'kg',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'Litros',
                    'acronym' => 'lt',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'Metros',
                    'acronym' => 'mt',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'Pies',
                    'acronym' => 'ft',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'Yardas',
                    'acronym' => 'yd',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'Horas',
                    'acronym' => 'hr',
                    'user_created_id' => 1
                ]
            ]);
    }
}
