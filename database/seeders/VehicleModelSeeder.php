<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class VehicleModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicle_models')->insert([
            [
                'name' => '1500C',
                'acronym' => '1500C',
                'user_created_id' => 1
            ],
            [
                'name' => '1500L',
                'acronym' => '1500L',
                'user_created_id' => 1
            ],
            [
                'name' => 'CAMARO',
                'acronym' => 'CAMARO',
                'user_created_id' => 1
            ],
            [
                'name' => 'CUTLASS',
                'acronym' => 'CUTLASS',
                'user_created_id' => 1
            ],
            [
                'name' => 'LEMANS',
                'acronym' => 'LEMANS',
                'user_created_id' => 1
            ],
            [
                'name' => 'MALIBU',
                'acronym' => 'MALIBU',
                'user_created_id' => 1
            ],
            [
                'name' => 'MONTECARLO',
                'acronym' => 'MONTECARLO',
                'user_created_id' => 1
            ],
            [
                'name' => 'MONTEROSA',
                'acronym' => 'MONTEROSA',
                'user_created_id' => 1
            ],
            [
                'name' => 'MONZA',
                'acronym' => 'MONZA',
                'user_created_id' => 1
            ],
            [
                'name' => 'POLSKI',
                'acronym' => 'POLSKI',
                'user_created_id' => 1
            ],
            [
                'name' => 'TEMPEST',
                'acronym' => 'TEMPEST',
                'user_created_id' => 1
            ],
            [
                'name' => 'TRANS-AM',
                'acronym' => 'TRANS-AM',
                'user_created_id' => 1
            ],
            [
                'name' => 'LUMINAVA',
                'acronym' => 'LUMINAVA',
                'user_created_id' => 1
            ],
            [
                'name' => 'BRONCE',
                'acronym' => 'BRONCE',
                'user_created_id' => 1
            ],
            [
                'name' => 'LLEVA-5',
                'acronym' => 'LLEVA-5',
                'user_created_id' => 1
            ],
            [
                'name' => 'LLEVA-1',
                'acronym' => 'LLEVA-1',
                'user_created_id' => 1
            ],
            [
                'name' => '626*CAPELL',
                'acronym' => '626*CAPELL',
                'user_created_id' => 1
            ],
            [
                'name' => 'BRONCE',
                'acronym' => 'BRONCE',
                'user_created_id' => 1
            ],
            [
                'name' => 'LLAVA-5',
                'acronym' => 'LLAVA-5',
                'user_created_id' => 1
            ]
        ]);
    }
}
