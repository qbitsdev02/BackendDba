<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fields')->insert(
        [
            [   
                'contract_number' => 'n° 58964',
                'denomination'=>'BL:BP-OCK#21b-j000082271',
                'acronym'=>'BP-OCK#21B',
                'address' => 'Guanta',
                'port_id' => 1,
                'organization_id' => 5,
                'field_supervisor_id'=> '1',
                'user_created_id' => 1

            ]
        ]);
    }
}
