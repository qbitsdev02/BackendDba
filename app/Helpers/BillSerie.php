<?php

namespace App\Helpers;

use App\Models\BillElectronic;

class BillSerie
{
    public static function lastNumber($value)
    {
        $voucherFirst = BillElectronic::where('serie_id', $value)->orderBy('id', 'desc')->first();
        if ($voucherFirst) {
            return $voucherFirst->number = $voucherFirst->number + 1;
        }
        return 1;
    }
}
