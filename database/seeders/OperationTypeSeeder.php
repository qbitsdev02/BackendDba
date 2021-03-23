<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class OperationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('operation_types')->insert([
            [
                'name' => 'Venta Interna',
                'description' => 'Venta Interna',
                'user_created_id' => 1
            ],
            [
                'name' => 'Exportación de Bienes',
                'description' => 'Exportación de Bienes',
                'user_created_id' => 1
            ]
        ]);
    }
}
