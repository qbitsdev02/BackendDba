<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class ClientTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('client_types')->insert([
            [
                'name' => 'Interno',
                'user_created_id' => 1
            ],
            [
                'name' => 'Distribuidor',
                'user_created_id' => 1
            ]
        ]);
    }
}
