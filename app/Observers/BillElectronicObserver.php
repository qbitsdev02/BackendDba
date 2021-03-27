<?php

namespace App\Observers;

use App\Models\BillElectronic;

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
        if (request()->bill_electronic_details) {
            $billElectronic
                ->billElectronicDetails()
                ->createMany(request()->bill_electronic_details);
        }
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
