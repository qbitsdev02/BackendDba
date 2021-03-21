<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class VehicleBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicle_brands')->insert([
            [
                'name' => 'U',
                'acronym' => 'U',
                'user_created_id' => 1
            ],
            [
                'name' => 'CH',
                'acronym' => 'CH',
                'user_created_id' => 1
            ],
            [
                'name' => 'PG',
                'acronym' => 'PG',
                'user_created_id' => 1
            ],
            [
                'name' => 'KU',
                'acronym' => 'KU',
                'user_created_id' => 1
            ],
            [
                'name' => 'E',
                'acronym' => 'E',
                'user_created_id' => 1
            ]
        ]);
    }
}
