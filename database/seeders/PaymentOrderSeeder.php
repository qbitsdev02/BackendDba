<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_orders')->insert(
            [
                [
                    'amount' => 1500,
                    'operation_type_id' => 3,
                    'ticket_id' => 1,
                    'entity_id' => 1,
                    'coin_id' => 2,
                    'user_created_id' => 1,        
                ]
            ]
        );
    }
}
