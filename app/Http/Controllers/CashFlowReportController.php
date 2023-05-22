<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CashFlow;
use Illuminate\Http\Request;
class CashFlowReportController extends Controller
{
    public function getBalance(Request $request)
    {
        $query = CashFlow::selectRaw('SUM(must) as must, SUM(to_have) as to_have, SUM(to_have) - SUM(must) as balance')
            ->first();

        return response()->json($query, 200);
    }
}
