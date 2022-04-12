<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'name' => 'Wire Transfer',
                'user_created_id' => 1
            ],
            [
                'name' => 'Zelle',
                'user_created_id' => 1
            ],
            [
                'name' => 'Cash',
                'user_created_id' => 1
            ],
            [
                'name' => 'Depósito',
                'user_created_id' => 1
            ],
            [
                'name' => 'TDC',
                'user_created_id' => 1
            ]
        ]);
    }
}
