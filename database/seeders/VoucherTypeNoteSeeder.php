<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class VoucherTypeNoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('voucher_type_notes')->insert([
            [
                'name' => 'Nota de crédito',
                'description' => 'Nota de crédito',
                'user_created_id' => 1
            ],
            [
                'name' => 'Nota de débio',
                'description' => 'Nota de débito',
                'user_created_id' => 1
            ]
        ]);
    }
}
