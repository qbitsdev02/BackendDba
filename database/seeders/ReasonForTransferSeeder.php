<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReasonForTransferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reason_for_transfers')
            ->insert([
                [
                    'description' => 'Compra nacional',
                    'user_created_id' => 1
                ],
                [
                    'description' => 'Consignación recibida',
                    'user_created_id' => 1
                ],
                [
                    'description' => 'Devolución recibida',
                    'user_created_id' => 1
                ],
                [
                    'description' => 'Inventario inicial',
                    'user_created_id' => 1
                ],
                [
                    'description' => 'Entrada de importación',
                    'user_created_id' => 1
                ],
                [
                    'description' => 'Ingreso de importación',
                    'user_created_id' => 1
                ],
                [
                    'description' => 'Entrada por devolución de producto',
                    'user_created_id' => 1
                ],
                [
                    'description' => 'Entrada por transferencia entre almacen',
                    'user_created_id' => 1
                ],
                [
                    'description' => 'Entrada para servicio de producción',
                    'user_created_id' => 1
                ],
                [
                    'description' => 'Entrada de bienes en prestamo',
                    'user_created_id' => 1
                ],
                [
                    'description' => 'Entrada por bienes en custodia',
                    'user_created_id' => 1
                ],
                [
                    'description' => 'Ingreso temporal',
                    'user_created_id' => 1
                ],
                [
                    'description' => 'Ingreso por transformación',
                    'user_created_id' => 1
                ],
                [
                    'description' => 'Ingreso por producción',
                    'user_created_id' => 1
                ],
                [
                    'description' => 'Entrada de importación',
                    'user_created_id' => 1
                ],
                [
                    'description' => 'Entrada por conversión de media',
                    'user_created_id' => 1
                ],
                [
                    'description' => 'Otros',
                    'user_created_id' => 1
                ]
            ]);
    }
}
