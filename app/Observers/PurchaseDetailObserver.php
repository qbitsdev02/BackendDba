<?php

namespace App\Observers;

use App\Models\PurchaseDetail;
use App\Services\KardexReportService;

class PurchaseDetailObserver
{
    /**
     * Handle the PurchaseDetail "created" event.
     *
     * @param  \App\Models\PurchaseDetail  $purchaseDetail
     * @return void
     */
    public function created(PurchaseDetail $purchaseDetail)
    {
        $kardexServices = new KardexReportService();
        $kardexServices->saveKardexReport($purchaseDetail);
    }

    /**
     * Handle the PurchaseDetail "updated" event.
     *
     * @param  \App\Models\PurchaseDetail  $purchaseDetail
     * @return void
     */
    public function updated(PurchaseDetail $purchaseDetail)
    {
        //
    }

    /**
     * Handle the PurchaseDetail "deleted" event.
     *
     * @param  \App\Models\PurchaseDetail  $purchaseDetail
     * @return void
     */
    public function deleted(PurchaseDetail $purchaseDetail)
    {
        //
    }

    /**
     * Handle the PurchaseDetail "restored" event.
     *
     * @param  \App\Models\PurchaseDetail  $purchaseDetail
     * @return void
     */
    public function restored(PurchaseDetail $purchaseDetail)
    {
        //
    }

    /**
     * Handle the PurchaseDetail "force deleted" event.
     *
     * @param  \App\Models\PurchaseDetail  $purchaseDetail
     * @return void
     */
    public function forceDeleted(PurchaseDetail $purchaseDetail)
    {
        //
    }
}
