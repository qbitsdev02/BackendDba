<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class VehicleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicle_types')->insert([
            [
                'name' => 'AUT',
                'acronym' => 'AUTO',
                'user_created_id' => 1
            ],
            [
                'name' => 'VAN',
                'acronym' => 'VAN',
                'user_created_id' => 1
            ],
            [
                'name' => 'T6',
                'acronym' => 'T6',
                'user_created_id' => 1
            ],
            [
                'name' => '6DR5',
                'acronym' => '6DR5',
                'user_created_id' => 1
            ],
            [
                'name' => 'COM',
                'acronym' => 'COM',
                'user_created_id' => 1
            ],
            [
                'name' => 'CAMION',
                'acronym' => 'CAMION',
                'user_created_id' => 1
            ],
            [
                'name' => 'PIC',
                'acronym' => 'PIC',
                'user_created_id' => 1
            ],
            [
                'name' => 'SPACO',
                'acronym' => 'SPACO',
                'user_created_id' => 1
            ],
            [
                'name' => 'ROLLWAY',
                'acronym' => 'ROLLWAY',
                'user_created_id' => 1
            ],
            [
                'name' => 'DIESEL',
                'acronym' => 'DIESEL',
                'user_created_id' => 1
            ],
            [
                'name' => 'HOLLE',
                'acronym' => 'HOLLE',
                'user_created_id' => 1
            ],
            [
                'name' => 'MONROE',
                'acronym' => 'MONROE',
                'user_created_id' => 1
            ],
            [
                'name' => 'HIT',
                'acronym' => 'HIT',
                'user_created_id' => 1
            ],
            [
                'name' => 'FIE',
                'acronym' => 'FIE',
                'user_created_id' => 1
            ],
            [
                'name' => 'NISSAN',
                'acronym' => 'NISSAN',
                'user_created_id' => 1
            ]
        ]);
    }
}
