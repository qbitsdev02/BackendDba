<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SerieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('series')
            ->insert([
                [
                    'name' => 'F001',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'F002',
                    'user_created_id' => 1
                ]
            ]);
    }
}
