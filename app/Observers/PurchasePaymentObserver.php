<?php

namespace App\Observers;

use App\Helpers\Calculate;
use App\Models\PurchasePayment;

class PurchasePaymentObserver
{
    /**
     * Handle the PurchasePayment "created" event.
     *
     * @param  \App\Models\PurchasePayment  $purchasePayment
     * @return void
     */
    public function created(PurchasePayment $purchasePayment)
    {
        $purchasePayment->balance = Calculate::calculateBalance();
        $purchasePayment->update();
    }

    /**
     * Handle the PurchasePayment "updated" event.
     *
     * @param  \App\Models\PurchasePayment  $purchasePayment
     * @return void
     */
    public function updated(PurchasePayment $purchasePayment)
    {
        //
    }

    /**
     * Handle the PurchasePayment "deleted" event.
     *
     * @param  \App\Models\PurchasePayment  $purchasePayment
     * @return void
     */
    public function deleted(PurchasePayment $purchasePayment)
    {
        //
    }

    /**
     * Handle the PurchasePayment "restored" event.
     *
     * @param  \App\Models\PurchasePayment  $purchasePayment
     * @return void
     */
    public function restored(PurchasePayment $purchasePayment)
    {
        //
    }

    /**
     * Handle the PurchasePayment "force deleted" event.
     *
     * @param  \App\Models\PurchasePayment  $purchasePayment
     * @return void
     */
    public function forceDeleted(PurchasePayment $purchasePayment)
    {
        //
    }
}
