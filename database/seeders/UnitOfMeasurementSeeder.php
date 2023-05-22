<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitOfMeasurementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unit_of_measurements')->insert([
            [
                'name' => 'Gramo',
                'acronym' => 'G',
                'user_created_id' => 1
            ],
            [
                'name' => 'Kilogramo',
                'acronym' => 'Kg',
                'user_created_id' => 1
            ],
            [
                'name' => 'Tonelada',
                'acronym' => 'T',
                'user_created_id' => 1
            ],
            [
                'name' => 'Hora',
                'acronym' => 'Hr',
                'user_created_id' => 1
            ],
            
        ]);
    }
}
