<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
                'name' => 'MODELO',
                'description' => 'MODELO',
                'user_created_id' => 1
            ],
            [
                'name' => 'CMOTOR',
                'description' => 'CMOTOR',
                'user_created_id' => 1
            ],
            [
                'name' => 'NUMCIL',
                'description' => 'NUMCIL',
                'user_created_id' => 1
            ],
            [
                'name' => 'CILIND',
                'description' => 'CILIND',
                'user_created_id' => 1
            ],
            [
                'name' => 'CYLIND',
                'description' => 'CYLIND',
                'user_created_id' => 1
            ],
            [
                'name' => 'DIAMET',
                'description' => 'DIAMET',
                'user_created_id' => 1
            ],
            [
                'name' => 'ANOINI',
                'description' => 'ANOINI',
                'user_created_id' => 1
            ],
            [
                'name' => 'ANOTER',
                'description' => 'ANOTER',
                'user_created_id' => 1
            ],
            [
                'name' => 'ALTERNANTE',
                'description' => 'ALTERNANTE',
                'user_created_id' => 1
            ],
            [
                'name' => 'UM',
                'description' => 'UM',
                'user_created_id' => 1
            ]
        ]);
    }
}
