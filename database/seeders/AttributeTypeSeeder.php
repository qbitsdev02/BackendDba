<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class AttributeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attribute_types')->insert([
            [
                'name' => 'Alternate',
                'description' => null,
                'user_created_id' => 1
            ],
            [
                'name' => 'NUMSEC',
                'description' => null,
                'user_created_id' => 1
            ],
            [
                'name' => 'CMOTOR',
                'description' => null,
                'user_created_id' => 1
            ],
            [
                'name' => 'NUMCIL',
                'description' => null,
                'user_created_id' => 1
            ],
            [
                'name' => 'CILIND',
                'description' => null,
                'user_created_id' => 1
            ],
            [
                'name' => 'CYLIND',
                'description' => null,
                'user_created_id' => 1
            ],
            [
                'name' => 'DIAMET',
                'description' => null,
                'user_created_id' => 1
            ]
        ]);
    }
}
