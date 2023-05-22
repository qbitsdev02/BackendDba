<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MasterSheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterReportController extends Controller
{
    public function totales(Request $request)
    {
        $totales = MasterSheet::get();
        $salesMaterials = $totales->sum('sales_material');
        $materialUtility = $totales->sum('material_utility');
        $utilityTm = $totales->sum('utility_tm');

        return response()->json([
            'total_sales_materials' => $salesMaterials,
            'material_utility' => $materialUtility,
            'utility_tm' => $utilityTm
        ], 200);
    }

    public function graphProductions(Request $request)
    {
        $graphs = DB::table('master_sheets')
            ->selectRaw('date, SUM((sales_price * (gross_weight - tare_weight)) - ((gross_weight - tare_weight) * penalty)) as sales')
            ->groupBy('date')
            ->get();

        return response()->json($graphs, 200);
    }
}
