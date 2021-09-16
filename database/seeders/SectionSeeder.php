<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')
            ->insert([
                [
                    'name' => 'sales',
                    'icon' => 'account_box',
                    'open' => true,
                    'user_created_id' => 1
                ],
                [
                    'name' => 'purchase',
                    'icon' => 'account_box',
                    'open' => true,
                    'user_created_id' => 1
                ],
                [
                    'name' => 'inventory',
                    'icon' => 'account_box',
                    'open' => true,
                    'user_created_id' => 1
                ],
                [
                    'name' => 'settings',
                    'icon' => 'settings',
                    'open' => true,
                    'user_created_id' => 1
                ]
            ]);
    }
}
