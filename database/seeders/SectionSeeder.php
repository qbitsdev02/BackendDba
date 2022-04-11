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
                    'name' => 'management',
                    'icon' => 'library_books',
                    'open' => true,
                    'user_created_id' => 1
                ],
                [
                    'name' => 'organization',
                    'icon' => 'business',
                    'open' => true,
                    'user_created_id' => 1
                ],
                [
                    'name' => 'personal',
                    'icon' => 'group',
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
