<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class CoinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coins')->insert([
            [
                'acronym' => 'USD',
                'name' => 'Dolares americanos',
                'active' => 1,
                'symbol' => '$',
                'user_created_id' => 1
            ],
            [
                'acronym' => 'PEN',
                'name' => 'Soles',
                'active' => 1,
                'symbol' => 'S/',
                'user_created_id' => 1
            ]
        ]);
    }
}
