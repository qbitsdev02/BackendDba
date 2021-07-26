<?php

namespace App\Observers;

use App\Helpers\Calculate;
use App\Models\BillElectronicPayment;

class BillElectronicPaymentObserver
{
    /**
     * Handle the BillElectronicPayment "created" event.
     *
     * @param  \App\Models\BillElectronicPayment  $billElectronicPayment
     * @return void
     */
    public function created(BillElectronicPayment $billElectronicPayment)
    {
        $billElectronicPayment->balance = Calculate::calculateBalance();
        $billElectronicPayment->update();
    }

    /**
     * Handle the BillElectronicPayment "updated" event.
     *
     * @param  \App\Models\BillElectronicPayment  $billElectronicPayment
     * @return void
     */
    public function updated(BillElectronicPayment $billElectronicPayment)
    {
        //
    }

    /**
     * Handle the BillElectronicPayment "deleted" event.
     *
     * @param  \App\Models\BillElectronicPayment  $billElectronicPayment
     * @return void
     */
    public function deleted(BillElectronicPayment $billElectronicPayment)
    {
        //
    }

    /**
     * Handle the BillElectronicPayment "restored" event.
     *
     * @param  \App\Models\BillElectronicPayment  $billElectronicPayment
     * @return void
     */
    public function restored(BillElectronicPayment $billElectronicPayment)
    {
        //
    }

    /**
     * Handle the BillElectronicPayment "force deleted" event.
     *
     * @param  \App\Models\BillElectronicPayment  $billElectronicPayment
     * @return void
     */
    public function forceDeleted(BillElectronicPayment $billElectronicPayment)
    {
        //
    }
}
