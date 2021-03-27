<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'TAPONES DE MOTOR (COPA) U 3089 70',
                'description' => 'TAPONES DE MOTOR (COPA) U 3089 70',
                'code' => '123',
                'category_id' => 1,
                'brand_id' => 1, 
                'user_created_id' => 1
            ],
            [
                'name' => 'TAPONES DE MOTOR (COPA) U 3089 108',
                'description' => 'TAPONES DE MOTOR (COPA) U 3089 108',
                'code' => '123',
                'category_id' => 1,
                'brand_id' => 1, 
                'user_created_id' => 1
            ]
        ]);
    }
}
