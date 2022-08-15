<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('guides')->insert(
            [
                [
                    'serie_number'=>000014,
                    'start_date'=>'25-08-2022',
                    'deadline'=>'26-08-2022',
                    'origin_address'=>'Guarico',
                    'destination_address'=>'Guanta',
                    'material'=>'tipo 1',
                    'code_runpa'=>'00001',
                    'weight'=>'10000',
                    'status'=>'active',
                    'provider_id'=>1,
                    'unit_of_measurement_id'=>3,
                    'vehicle_id'=>1,
                    'trailer_id'=>1,
                    'client_id'=>1,
                    'driver_id'=>4,
                    'user_created_id'=>1,
                ],
            ]
        );
    }
}
