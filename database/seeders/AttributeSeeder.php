<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attributes')->insert(
            [
                [
                    'name'=>'color',
                    'description'=>'color del item',
                    'user_created_id' => 1
                ],
                [
                    'name'=>'marca',
                    'description'=>'marca del item',
                    'user_created_id' => 1
                ],
                [
                    'name'=>'modelo',
                    'description'=>'modelo del item',
                    'user_created_id' => 1
                ],
            ]
        );
    }
}
