<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('entities')->insert([
            [
                'name' => 'Oficina Lechería',
                'user_created_id' => 1
            ],
            [
                'name' => 'BOFA',
                'user_created_id' => 1
            ],
            [
                'name' => 'Chase Bank',
                'user_created_id' => 1
            ],
            [
                'name' => 'Citibank',
                'user_created_id' => 1
            ],
            [
                'name' => 'Henry González',
                'user_created_id' => 1
            ],
            [
                'name' => 'Kevin Contreras',
                'user_created_id' => 1
            ],
            [
                'name' => 'María Fernanda',
                'user_created_id' => 1
            ],
            [
                'name' => 'Oficina Miami',
                'user_created_id' => 1
            ],
            [
                'name' => 'Samiel Altuve',
                'user_created_id' => 1
            ],
            [
                'name' => 'Wells Fargo',
                'user_created_id' => 1
            ]
        ]);
    }
}
