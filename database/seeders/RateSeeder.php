<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Extension\Table\Table;

class RateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rates')->insert([
            [
                'rate' => '25.00',
                'description' => 'Pago por Horas.',
                'provider_id' => 1,
                'unit_of_measurements_id' => 4,
                'coin_id' => 1,
                'user_created_id' => 1,     
            ]
        ]);
    }
}
