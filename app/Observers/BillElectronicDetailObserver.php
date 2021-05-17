<?php

namespace App\Observers;

use App\Models\BillElectronicDetail;
use App\Services\KardexReportService;

class BillElectronicDetailObserver
{
    /**
     * Handle the BillElectronicDetail "created" event.
     *
     * @param  \App\Models\BillElectronicDetail  $billElectronicDetail
     * @return void
     */
    public function created(BillElectronicDetail $billElectronicDetail)
    {
        $kardexServices = new KardexReportService();
        $kardexServices->saveKardexReport($billElectronicDetail);
    }

    /**
     * Handle the BillElectronicDetail "updated" event.
     *
     * @param  \App\Models\BillElectronicDetail  $billElectronicDetail
     * @return void
     */
    public function updated(BillElectronicDetail $billElectronicDetail)
    {
        //
    }

    /**
     * Handle the BillElectronicDetail "deleted" event.
     *
     * @param  \App\Models\BillElectronicDetail  $billElectronicDetail
     * @return void
     */
    public function deleted(BillElectronicDetail $billElectronicDetail)
    {
        //
    }

    /**
     * Handle the BillElectronicDetail "restored" event.
     *
     * @param  \App\Models\BillElectronicDetail  $billElectronicDetail
     * @return void
     */
    public function restored(BillElectronicDetail $billElectronicDetail)
    {
        //
    }

    /**
     * Handle the BillElectronicDetail "force deleted" event.
     *
     * @param  \App\Models\BillElectronicDetail  $billElectronicDetail
     * @return void
     */
    public function forceDeleted(BillElectronicDetail $billElectronicDetail)
    {
        //
    }
}
