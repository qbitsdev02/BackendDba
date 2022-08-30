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
                    'transaction_type' => 'entry',
                    'user_created_id' => 1,
                ],
                [
                    'name' => 'Costos',
                    'description' => '',
                    'transaction_type' => 'egress',
                    'user_created_id' => 1,
                ],
                [
                    'name' => 'Gastos Operacionales',
                    'description' => '',
                    'transaction_type' => 'egress',
                    'user_created_id' => 1,
                ],
                [
                    'name' => 'Gastos Administrativos',
                    'description' => '',
                    'transaction_type' => 'egress',
                    'user_created_id' => 1,
                ],
                [
                    'name' => 'Gestión Social',
                    'description' => '',
                    'transaction_type' => 'egress',
                    'user_created_id' => 1,
                ],
                [
                    'name' => 'Donaciones',
                    'description' => '',
                    'transaction_type' => 'egress',
                    'user_created_id' => 1,
                ],
                [
                    'name' => 'Inversiones',
                    'description' => '',
                    'transaction_type' => 'egress',
                    'user_created_id' => 1,
                ],
                [
                    'name' => 'Financiamientos',
                    'description' => '',
                    'transaction_type' => 'egress',
                    'user_created_id' => 1,
                ],
                [
                    'name' => 'Anticipo utilidad socio',
                    'description' => '',
                    'transaction_type' => 'egress',
                    'user_created_id' => 1,
                ]
            ]
        );
    }
}
