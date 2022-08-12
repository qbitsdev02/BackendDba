<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;

class FieldCashFlowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('field_cash_flows')->insert(
            [
                [
                    'amount' => 1200,
                    'concept_id' => 1,
                    'description' => 'pago',
                    'status'=>'approved',
                    'balance' => 2563,
                    'transaction_id'=>4,
                    'field_id' => 1,
                    'beneficiary_id' => NULL,
                    'user_created_id' => 1,
                   
                ],                
                [
                    'amount' => 3200,
                    'concept_id' => 3,
                    'description' => 'pago',
                    'status'=>'pending_approval',
                    'balance' => 56,
                    'transaction_id'=>4,
                    'field_id' => 1,
                    'beneficiary_id' => 1,
                    'user_created_id' => 1,
                   
                ]
            ]
        );
    }
}
