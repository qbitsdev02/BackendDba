<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class VoucherTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('voucher_types')->insert([
            [
                'name' => 'Factura Electrónica',
                'description' => 'Factura Electrónica',
                'user_created_id' => 1
            ],
            [
                'name' => 'Boleta de venta electrónica',
                'description' => 'Boleta de venta electrónica',
                'user_created_id' => 1
            ]
        ]);
    }
}
