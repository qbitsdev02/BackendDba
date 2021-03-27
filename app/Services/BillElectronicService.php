<?php

namespace App\Services;
use App\Models\BillElectronic;

class BillElectronicService
{
    public function saveBillElectronicDetails(BillElectronic $billElectronic, $billElectronicDetail)
    {
        if ($billElectronicDetail) {
            $billElectronic
                ->billElectronicDetails()
                ->createMany($billElectronicDetail);
        }
    }

    public function savebillElectronicPayments(BillElectronic $billElectronic, $billElectronicPayments)
    {
        if ($billElectronicPayments) {
            $billElectronic
                ->billElectronicPayments()
                ->createMany($billElectronicPayments);
        }
    }    
}
