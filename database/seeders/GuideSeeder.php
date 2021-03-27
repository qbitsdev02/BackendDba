<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class GuideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('guides')
            ->insert([
                [
                    'name' => 'Guia de remisión remitente electrónica',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'Guía de remisión transportista',
                    'user_created_id' => 1
                ]
            ]);
    }
}
