<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert(
            [
                [
                    'img' => 'esto es una imagen',
                    'field_cash_flow_id' => 1,
                    'user_created_id' => 1,
               
                ]
            ]
        );
    }
}
