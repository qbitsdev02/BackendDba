<?php

namespace Database\Seeders;

use App\Models\ChartOfAccount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChartOfAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accounts = [
            ['name' => 'Activos', 'code' => '1', 'chart_of_account_id' => null, 'user_created_id' => 1],
            ['name' => 'Activos corrientes', 'code' => '1.1', 'chart_of_account_id' => 1, 'user_created_id' => 1],
            ['name' => 'Caja', 'code' => '1.1.1', 'chart_of_account_id' => 2, 'user_created_id' => 1],
            ['name' => 'Bancos', 'code' => '1.1.2', 'chart_of_account_id' => 2, 'user_created_id' => 1],
            ['name' => 'Inversiones', 'code' => '1.1.3', 'chart_of_account_id' => 2, 'user_created_id' => 1],
            ['name' => 'Activos no corrientes', 'code' => '1.2', 'chart_of_account_id' => 1, 'user_created_id' => 1],
            ['name' => 'Propiedades, planta y equipo', 'code' => '1.2.1', 'chart_of_account_id' => 6, 'user_created_id' => 1],
            ['name' => 'Terrenos', 'code' => '1.2.1.1', 'chart_of_account_id' => 7, 'user_created_id' => 1],
            ['name' => 'Edificios', 'code' => '1.2.1.2', 'chart_of_account_id' => 7, 'user_created_id' => 1],
            ['name' => 'Maquinaria', 'code' => '1.2.1.3', 'chart_of_account_id' => 7, 'user_created_id' => 1],
            ['name' => 'Depreciación acumulada', 'code' => '1.2.2', 'chart_of_account_id' => 6, 'user_created_id' => 1],
            ['name' => 'Pasivos', 'code' => '2', 'chart_of_account_id' => null, 'user_created_id' => 1],
            ['name' => 'Pasivos corrientes', 'code' => '2.1', 'chart_of_account_id' => 12, 'user_created_id' => 1],
            ['name' => 'Cuentas por pagar', 'code' => '2.1.1', 'chart_of_account_id' => 13, 'user_created_id' => 1],
            ['name' => 'Sueldos por pagar', 'code' => '2.1.2', 'chart_of_account_id' => 13, 'user_created_id' => 1],
            ['name' => 'Impuestos por pagar', 'code' => '2.1.3', 'chart_of_account_id' => 13, 'user_created_id' => 1],
            ['name' => 'Pasivos no corrientes', 'code' => '2.2', 'chart_of_account_id' => 12, 'user_created_id' => 1],
            ['name' => 'Préstamos a largo plazo', 'code' => '2.2.1', 'chart_of_account_id' => 16, 'user_created_id' => 1],
            ['name' => 'Patrimonio', 'code' => '3', 'chart_of_account_id' => null, 'user_created_id' => 1],
            ['name' => 'Capital social', 'code' => '3.1', 'chart_of_account_id' => 18, 'user_created_id' => 1],
            ['name' => 'Utilidades retenidas', 'code' => '3.2', 'chart_of_account_id' => 18, 'user_created_id' => 1],
        ];

        foreach ($accounts as $account) {
            ChartOfAccount::create($account);
        }
    }
}
