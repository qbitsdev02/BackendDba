<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProviderTypeProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provider_type_provider')->insert(
            [
                [
                    'provider_type_id' => 1,
                    'provider_id' => 1,
                    'user_created_id' => 1
                ]
            ]
        );
    }
}
