<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('module_role')
            ->insert([
                [
                    'role_id' => 1,
                    'module_id' => 1,
                    'permissions' => '["1", "2", "3", "4", "5", "6", "7"]'
                ],
                [
                    'role_id' => 1,
                    'module_id' => 2,
                    'permissions' => '["1", "2", "3", "4", "5", "6", "7"]'
                ],
                [
                    'role_id' => 1,
                    'module_id' => 3,
                    'permissions' => '["1", "2", "3", "4", "5", "6", "7"]'
                ],
                [
                    'role_id' => 1,
                    'module_id' => 4,
                    'permissions' => '["1", "2", "3", "4", "5", "6", "7"]'
                ],
                [
                    'role_id' => 1,
                    'module_id' => 5,
                    'permissions' => '["1", "2", "3", "4", "5", "6", "7"]'
                ],
                [
                    'role_id' => 1,
                    'module_id' => 6,
                    'permissions' => '["1", "2", "3", "4", "5", "6", "7"]'
                ],
                [
                    'role_id' => 1,
                    'module_id' => 7,
                    'permissions' => '["1", "2", "3", "4", "5", "6", "7"]'
                ],
                [
                    'role_id' => 1,
                    'module_id' => 8,
                    'permissions' => '["1", "2", "3", "4", "5", "6", "7"]'
                ],
                [
                    'role_id' => 1,
                    'module_id' => 9,
                    'permissions' => '["1", "2", "3", "4", "5", "6", "7"]'
                ],
                [
                    'role_id' => 1,
                    'module_id' => 10,
                    'permissions' => '["1", "2", "3", "4", "5", "6", "7"]'
                ],
                [
                    'role_id' => 1,
                    'module_id' => 11,
                    'permissions' => '["1", "2", "3", "4", "5", "6", "7"]'
                ],
                [
                    'role_id' => 1,
                    'module_id' => 12,
                    'permissions' => '["1", "2", "3", "4", "5", "6", "7"]'
                ],
                [
                    'role_id' => 1,
                    'module_id' => 13,
                    'permissions' => '["1", "2", "3", "4", "5", "6", "7"]'
                ],
                [
                    'role_id' => 1,
                    'module_id' => 14,
                    'permissions' => '["1", "2", "3", "4", "5", "6", "7"]'
                ],
                [
                    'role_id' => 1,
                    'module_id' => 16,
                    'permissions' => '["1", "2", "3", "4", "5", "6", "7"]'
                ],
                [
                    'role_id' => 1,
                    'module_id' => 17,
                    'permissions' => '["1", "2", "3", "4", "5", "6", "7"]'
                ],
                [
                    'role_id' => 1,
                    'module_id' => 24,
                    'permissions' => '["1", "2", "3", "4", "5", "6", "7"]'
                ],
                [
                    'role_id' => 1,
                    'module_id' => 25,
                    'permissions' => '["1", "2", "3", "4", "5", "6", "7"]'
                ],
                [
                    'role_id' => 1,
                    'module_id' => 26,
                    'permissions' => '["1", "2", "3", "4", "5", "6", "7"]'
                ]
            ]);
    }
}
