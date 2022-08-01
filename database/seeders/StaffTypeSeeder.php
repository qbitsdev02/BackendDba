<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StaffTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('staff_types')->insert(
            [
                [
                    'name' => 'Chofer',
                    'description' => 'Chofer camion',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'Mecanico',
                    'description' => 'Mecanico Deiesel',
                    'user_created_id' => 1
                ],
            ],
          
        );
    }
}
