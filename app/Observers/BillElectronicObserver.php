<?php

namespace App\Observers;

use App\Models\BillElectronic;
use App\Services\BillElectronicService;

class BillElectronicObserver
{
    /**
     * Handle the BillElectronic "created" event.
     *
     * @param  \App\Models\BillElectronic  $billElectronic
     * @return void
     */
    public function created(BillElectronic $billElectronic)
    {
        $service = new BillElectronicService();
        $service->saveBillElectronicDetails($billElectronic, request()->bill_electronic_details);
        $service->saveBillElectronicPayments($billElectronic, request()->bill_electronic_payments);
        $service->saveBillElectronicGuides($billElectronic, request()->bill_electronic_guides);
    }

    /**
     * Handle the BillElectronic "updated" event.
     *
     * @param  \App\Models\BillElectronic  $billElectronic
     * @return void
     */
    public function updated(BillElectronic $billElectronic)
    {
        //
    }

    /**
     * Handle the BillElectronic "deleted" event.
     *
     * @param  \App\Models\BillElectronic  $billElectronic
     * @return void
     */
    public function deleted(BillElectronic $billElectronic)
    {
        //
    }

    /**
     * Handle the BillElectronic "restored" event.
     *
     * @param  \App\Models\BillElectronic  $billElectronic
     * @return void
     */
    public function restored(BillElectronic $billElectronic)
    {
        //
    }

    /**
     * Handle the BillElectronic "force deleted" event.
     *
     * @param  \App\Models\BillElectronic  $billElectronic
     * @return void
     */
    public function forceDeleted(BillElectronic $billElectronic)
    {
        //
    }
}
