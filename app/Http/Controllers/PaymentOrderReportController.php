<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PaymentOrder;
use Illuminate\Http\Request;

class PaymentOrderReportController extends Controller
{
    public function getTotalForStatus(Request $request)
    {

        $paymentOrders = PaymentOrder::selectRaw('SUM(amount) as amount, status')
            ->where('status', $request->status)
            ->groupBy('status')
            ->get();
        return response()->json($paymentOrders);
    }
}
