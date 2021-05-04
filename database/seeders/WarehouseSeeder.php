<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('warehouses')
            ->insert([
                [
                    'branch_office_id' => 1,
                    'description' => 'Almacen principal',
                    'user_created_id' => 1
                ]
            ]);
    }
}
