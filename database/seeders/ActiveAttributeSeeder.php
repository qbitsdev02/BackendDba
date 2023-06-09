<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActiveAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('active_attribute')->insert(
            [
                [
                    'active_id'=> 1,
                    'attribute_id'=> 1,
                    'user_created_id'=> 1,
                ],
                [
                    'active_id'=> 1,
                    'attribute_id'=> 2,
                    'user_created_id'=> 1,
                ],
                [
                    'active_id'=> 1,
                    'attribute_id'=> 3,
                    'user_created_id'=> 1,
                ],
            ]
        );
    }
}
