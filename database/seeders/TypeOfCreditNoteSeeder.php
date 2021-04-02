<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TypeOfCreditNoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_of_credit_notes')->insert([
            [
                'name' => 'Ajustes afectos al IVAP',
                'description' => 'Ajustes afectos al IVAP',
                'user_created_id' => 1
            ],
            [
                'name' => 'Ajustes de operaciones de exportacion',
                'description' => 'Ajustes de operaciones de exportacion',
                'user_created_id' => 1
            ],
            [
                'name' => 'Anulación por error en el RUC',
                'description' => 'Anulación por error en el RUC',
                'user_created_id' => 1
            ],
            [
                'name' => 'Anulación de la operación',
                'description' => 'Anulación de la operación',
                'user_created_id' => 1
            ],
            [
                'name' => 'Bonificación',
                'description' => 'Bonificación',
                'user_created_id' => 1
            ],
            [
                'name' => 'Correción por error en la descripción',
                'description' => 'Correción por error en la descripción',
                'user_created_id' => 1
            ],
            [
                'name' => 'Descuento global',
                'description' => 'Descuento global',
                'user_created_id' => 1
            ],
            [
                'name' => 'Descuento por item',
                'description' => 'Descuento por item',
                'user_created_id' => 1
            ],
            [
                'name' => 'Devolución por item',
                'description' => 'Devolución por item',
                'user_created_id' => 1
            ],
            [
                'name' => 'Disminución en el valor',
                'description' => 'Disminución en el valor',
                'user_created_id' => 1
            ],
            [
                'name' => 'Otros Conceptos',
                'description' => 'Otros Conceptos',
                'user_created_id' => 1
            ]
        ]);
    }
}
