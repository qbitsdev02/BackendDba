<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            // 1
            [
                'value' => 'viewAny',
                'label' => 'ver modulo',
                'user_created_id' => 1
            ],
            // 2
            [
                'value' => 'read',
                'label' => 'leer modulo',
                'user_created_id' => 1
            ],
            // 3
            [
                'value' => 'create',
                'label' => 'crear modulo',
                'user_created_id' => 1
            ],
            // 4
            [
                'value' => 'update',
                'label' => 'actualizar modulo',
                'user_created_id' => 1
            ],
            // 5
            [
                'value' => 'delete',
                'label' => 'eliminar modulo',
                'user_created_id' => 1
            ],
            // 6
            [
                'value' => 'restore',
                'label' => 'restaurar modulo',
                'user_created_id' => 1
            ],
            // 7
            [
                'value' => 'forceDelete',
                'label' => 'eliminar permanentemente',
                'user_created_id' => 1
            ]
        ]);
    }
}
