<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AttributeTypeProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attribute_type_product')
            ->insert([
                [
                    'product_id' => 1,
                    'attribute_type_id' => 1,
                    'description' => '432421',
                    'user_created_id' => 1
                ],
                [
                    'product_id' => 1,
                    'attribute_type_id' => 2,
                    'description' => '4324232231',
                    'user_created_id' => 1
                ],
                [
                    'product_id' => 1,
                    'attribute_type_id' => 3,
                    'description' => '412321',
                    'user_created_id' => 1
                ],
                [
                    'product_id' => 1,
                    'attribute_type_id' => 4,
                    'description' => '8754635653',
                    'user_created_id' => 1
                ],
                [
                    'product_id' => 1,
                    'attribute_type_id' => 5,
                    'description' => '324656',
                    'user_created_id' => 1
                ],
                [
                    'product_id' => 1,
                    'attribute_type_id' => 6,
                    'description' => '2414324',
                    'user_created_id' => 1
                ],
                [
                    'product_id' => 1,
                    'attribute_type_id' => 7,
                    'description' => '432432',
                    'user_created_id' => 1
                ],
                [
                    'product_id' => 2,
                    'attribute_type_id' => 1,
                    'description' => '432421',
                    'user_created_id' => 1
                ],
                [
                    'product_id' => 2,
                    'attribute_type_id' => 2,
                    'description' => '4324232231',
                    'user_created_id' => 1
                ],
                [
                    'product_id' => 2,
                    'attribute_type_id' => 3,
                    'description' => '412321',
                    'user_created_id' => 1
                ],
                [
                    'product_id' => 2,
                    'attribute_type_id' => 4,
                    'description' => '8754635653',
                    'user_created_id' => 1
                ],
                [
                    'product_id' => 2,
                    'attribute_type_id' => 5,
                    'description' => '324656',
                    'user_created_id' => 1
                ],
                [
                    'product_id' => 2,
                    'attribute_type_id' => 6,
                    'description' => '2414324',
                    'user_created_id' => 1
                ],
                [
                    'product_id' => 2,
                    'attribute_type_id' => 7,
                    'description' => '432432',
                    'user_created_id' => 1
                ]
            ]);
    }
}
