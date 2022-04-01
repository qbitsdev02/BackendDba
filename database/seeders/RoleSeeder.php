<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'Super Administrador',
                'acronym' => 'super_admin',
                'user_created_id' => 1
            ],
            [
                'name' => 'Administrador',
                'acronym' => 'admin',
                'user_created_id' => 1
            ],
            [
                'name' => 'Responsable',
                'acronym' => 'responsable',
                'user_created_id' => 1
            ],
            [
                'name' => 'Beneficiario',
                'acronym' => 'bnfcr',
                'user_created_id' => 1
            ],
            [
                'name' => 'Proveedor',
                'acronym' => 'provider',
                'user_created_id' => 1
            ]
        ]);
    }
}
