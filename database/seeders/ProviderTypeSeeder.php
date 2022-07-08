<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProviderTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provider_types')->insert([
            [
                'name' => 'Seguridad',
                'description' => 'Empresa de seguridad',
                'user_created_id' => 1,
            ],
            [
                'name' => 'Transporte',
                'description' => 'Empresa de transporte',
                'user_created_id' => 1,
            ]
        ]);
    }
}
