<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            [
                [
                    'name' => 'Ventas',
                    'description' => 'Ventas',
                    'user_created_id' => 1,
                ],
                [
                    'name' => 'Costos',
                    'description' => '',
                    'user_created_id' => 1,
                ],
                [
                    'name' => 'Gastos Operacionales',
                    'description' => '',
                    'user_created_id' => 1,
                ],
                [
                    'name' => 'Gastos Administrativos',
                    'description' => '',
                    'user_created_id' => 1,
                ],
                [
                    'name' => 'Gestión Social',
                    'description' => '',
                    'user_created_id' => 1,
                ],
                [
                    'name' => 'Donaciones',
                    'description' => '',
                    'user_created_id' => 1,
                ],
                [
                    'name' => 'Inversiones',
                    'description' => '',
                    'user_created_id' => 1,
                ],
                [
                    'name' => 'Financiamientos',
                    'description' => '',
                    'user_created_id' => 1,
                ],
                [
                    'name' => 'Anticipo utilidad socio',
                    'description' => '',
                    'user_created_id' => 1,
                ]
            ]
        );
    }
}
