<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actives')->insert(
            [
                [
                    "name" => "Camion",
                    "status" => "active",
                    "description" => "Camion 6 ejes",
                    "provider_id" => 1,
                    "user_created_id" => 1
                    
                ],
                [
                    "name" => "Grua",
                    "status" => "active",
                    "description" => "Grua",
                    "provider_id" => 1,
                    "user_created_id" => 1
                    
                ],
                [
                    "name" => "maquina para soldar ",
                    "status" => "active",
                    "description" => "maquina para soldar",
                    "provider_id" => 1,
                    "user_created_id" => 1
                    
                ]
            ]
        );
    }
}
