<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PaymentDestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_destinations')->insert([
            [
                'name' => 'Banco',
                'description' => 'Banco',
                'user_created_id' => 1
            ],
            [
                'name' => 'Caja',
                'description' => 'Caja',
                'user_created_id' => 1
            ]
        ]);
    }
}
