<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('branch_office_role_user')->insert([
            [
                'user_id' => 1,
                'role_id' => 1,
                'branch_office_id' => 1
            ]
        ]);
    }
}
