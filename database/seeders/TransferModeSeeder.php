<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransferModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transfer_modes')
            ->insert([
                [
                    'name' => 'Transporte público',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'Transporte privado',
                    'user_created_id' => 1
                ]
            ]);
    }
}
