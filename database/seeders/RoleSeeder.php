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
            ],
            [
                'name' => 'Supervisor de campo',
                'acronym' => 'field_supervisor',
                'user_created_id' => 1
            ],
            [
                'name' => 'Banquero',
                'acronym' => 'banker',
                'user_created_id' => 1
            ],
            [
                'name' => 'Gerente',
                'acronym' => 'gerente',
                'user_created_id' => 1
            ],

        ]);
    }
}
