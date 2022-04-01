<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BranchOfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('branch_offices')->insert([
            [
                'name' => 'Sucursal 1',
                'description' => 'Sucursal 1',
                'user_created_id' => 1
            ]
        ]);
    }
}
