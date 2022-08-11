<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions')->insert(
            [
                [
                    'amount' => 2500,
                    'description' => 'pago provedor',
                    'date' => '25/09/2022',
                    'concept_id' => 13,
                    'payment_order_id' => 7,
                    'reference' => 000001,
                    'user_created_id' => 1 
                ],
 
            ]
        );
    }
}
