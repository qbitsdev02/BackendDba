<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        DB::table('categories')->insert(
            [
                [
                    'name' => 'Gestión social',
                    'description' => '',
                    'user_created_id' => 1,
                ],
                [
                    'name' => 'Gastos operacionales',
                    'description' => '',
                    'user_created_id' => 1,
                ],
                [
                    'name' => 'Costo',
                    'description' => '',
                    'user_created_id' => 1,
                ],
            ]
        );
    }
}
