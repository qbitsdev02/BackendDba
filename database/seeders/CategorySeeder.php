<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'AUTO',
                'description' => 'AUTO',
                'user_created_id' => 1
            ],
            [
                'name' => 'VAN',
                'description' => 'VAN',
                'user_created_id' => 1
            ],
            [
                'name' => 'T6',
                'description' => 'T6',
                'user_created_id' => 1
            ],
            [
                'name' => '6DR5',
                'description' => '6DR5',
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
                'name' => 'ROLLWY',
                'acronym' => 'ROLLWY',
                'user_created_id' => 1
            ]
        ]);
    }
}
