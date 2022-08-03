<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert(
            [
                [
                    'name' => 'qbit company',
                    'document_number' => 'J-8963214578',
                    'description' => 'empresa de desarrollo',
                    'user_created_id' => 1
                ]
            ]
        );
    }
}
