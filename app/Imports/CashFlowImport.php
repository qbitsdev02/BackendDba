<?php

namespace App\Imports;

use App\Models\CashFlow;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CashFlowImport implements ToModel, WithHeadingRow
{
    use Importable;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        info($row);
        return new CashFlow([
            'date' => $row['fecha'],
            'category' => $row['partida'],
            'concept_type' => $row['tipo_de_partida'],
            'concept' => $row['concepto'],
            'beneficiary' => $row['beneficiario'],
            'description' => $row['descripcion'],
            'provider' => $row['provedor_contrato'],
            'guide_number' => $row['nro_de_guia'],
            'weight' => $row['peso_neto_kg'],
            'control_number' => $row['nro_control'],
            'must' => $row['debe'],
            'to_have' => $row['haber'],
            'balance' => $row['saldo'],
            'user_created_id' => 1
        ]);
    }
}
