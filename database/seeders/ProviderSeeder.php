<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProviderSeeder extends Seeder
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
                'user_id' => 4,
                'role_id' => 5,
                'branch_office_id' => 1
            ]
        ]);
    }
}
