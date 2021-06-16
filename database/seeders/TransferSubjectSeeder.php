<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransferSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transfer_subjects')
            ->insert([
                [
                    'name' => 'Venta',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'Compra',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'Traslado entre establecimientos de la misma empresa',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'Importación',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'Exportación',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'Otros',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'Venta sujeta a confirmación del comprador',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'Traslado emisor itinerante CP',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'Traslado a zona primaria',
                    'user_created_id' => 1
                ]
            ]);
    }
}
