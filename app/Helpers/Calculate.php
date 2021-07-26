<?php

namespace App\Helpers;

use App\Models\BillElectronicPayment;
use App\Models\PurchasePayment;

class Calculate
{
    public static function calculateBalance()
    {
        return BillElectronicPayment::select('amount')->get()->sum('amount') - PurchasePayment::select('amount')->get()->sum('amount');
    }
}
