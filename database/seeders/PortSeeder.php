<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PortSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ports')->insert([
            [
                'name' => 'Puerto de Guanta',
                'rif' => 'J-326489',
                'city' => 'Guanta',
                'state' => 'Anzoategui',
                'user_created_id' => 1
            ],
            [
                'name' => 'Puerto cabello',
                'rif' => 'J-789542',
                'city' => 'Puerto cabello',
                'state' => 'Carabobo',
                'user_created_id' => 1
            ]
        ]);
    }
}
