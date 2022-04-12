<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConceptTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('concept_types')->insert([
            [
                'name' => 'Ingreso',
                'sign' => '+',
                'user_created_id' => 1
            ],
            [
                'name' => 'Egreso',
                'sign' => '-',
                'user_created_id' => 1
            ]
        ]);
    }
}
