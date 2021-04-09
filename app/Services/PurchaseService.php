<?php

namespace App\Services;
use App\Models\Purchase;

class PurchaseService
{
    public function savePurchaseDetails(Purchase $purchase, $purchaseDetail)
    {
        if ($purchaseDetail) {
            $purchase
                ->purchaseDetails()
                ->createMany($purchaseDetail);
        }
    }

    public function savePurchasePayments(Purchase $purchase, $purchasePayments)
    {
        if ($purchasePayments) {
            $purchase
                ->purchasePayments()
                ->createMany($purchasePayments);
        }
    }
}
