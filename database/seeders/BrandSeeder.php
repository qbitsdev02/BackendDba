<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            [
                'name' => 'U',
                'description' => 'U',
                'user_created_id' => 1
            ],
            [
                'name' => 'CH',
                'description' => 'CH',
                'user_created_id' => 1
            ],
            [
                'name' => 'PG',
                'description' => 'PG',
                'user_created_id' => 1
            ],
            [
                'name' => 'KU',
                'description' => 'KU',
                'user_created_id' => 1
            ],
            [
                'name' => 'E',
                'description' => 'E',
                'user_created_id' => 1
            ]
        ]);
    }
}
