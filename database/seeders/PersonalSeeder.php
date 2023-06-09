<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personals')->insert(
            [
                [
                    "name" => "Pedro",
                    "last_name" => "Correa",
                    "document_number" => "15987654",
                    "ownerable_type" => 'App\\Models\\Provider',
                    "ownerable_id" => 1,
                    "staff_type_id" => 2,
                    "user_created_id" => 1
                    ],
                [
                    "name" => "Alejandro",
                    "last_name" => "perez",
                    "document_number" => "14859741",
                    "ownerable_type" => 'App\\Models\\Provider',
                    "ownerable_id" => 1,
                    "staff_type_id" => 2,
                    "user_created_id" => 1
                ],
                [
                    "name" => "Hugo",
                    "last_name" => "Contreras",
                    "document_number" => "8965321",
                    "staff_type_id" => 2,
                    "ownerable_type" => 'App\\Models\\Provider',
                    "ownerable_id" => 1,
                    "user_created_id" => 1
                ]

            ]
        );
    }
}
