<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organizations')->insert([
            [
                'name' => 'CMM',
                'user_created_id' => 1
            ],
            [
                'name' => 'Dipermeca C.A.',
                'user_created_id' => 1
            ],
            [
                'name' => 'Hammer & Helmet',
                'user_created_id' => 1
            ],
            [
                'name' => 'Ideproc',
                'user_created_id' => 1
            ],
            [
                'name' => 'Protocol Capital WLL',
                'user_created_id' => 1
            ],
            [
                'name' => 'Qbits Dev',
                'user_created_id' => 1
            ]
        ]);
    }
}
