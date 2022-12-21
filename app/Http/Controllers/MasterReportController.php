<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MasterSheet;
use Illuminate\Http\Request;

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
}
