<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DevolutionReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('devolution_reasons')
            ->insert([
                [
                    'name' => 'Productos vencidos',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'Productos dañados',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'Productos con errores de fabricas',
                    'user_created_id' => 1
                ]
            ]);
    }
}
