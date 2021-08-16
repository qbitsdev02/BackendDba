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

    public function saveBillElectronicPayments(BillElectronic $billElectronic, $billElectronicPayments)
    {
        if ($billElectronicPayments) {
            $billElectronic
                ->billElectronicPayments()
                ->delete();

            $billElectronic
                ->billElectronicPayments()
                ->createMany($billElectronicPayments);
        }
    }

    public function saveBillElectronicGuides(BillElectronic $billElectronic, $billElectronicGuides)
    {
        if ($billElectronicGuides) {
            $billElectronic
                ->billElectronicGuides()
                ->createMany($billElectronicGuides);
        }
    }

    public function saveBillFees(BillElectronic $billElectronic, $saveBillFees)
    {
        if ($saveBillFees) {
            $billElectronic
                ->billFess()
                ->createMany($saveBillFees);
        }
    }
}
