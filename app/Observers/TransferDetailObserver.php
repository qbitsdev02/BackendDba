<?php

namespace App\Observers;

use App\Models\TransferDetail;
use App\Services\KardexReportService;

class TransferDetailObserver
{
    /**
     * Handle the TransferDetail "created" event.
     *
     * @param  \App\Models\TransferDetail  $transferDetail
     * @return void
     */
    public function created(TransferDetail $transferDetail)
    {
        $kardexServices = new KardexReportService();
        $kardexServices->saveKardexReport($transferDetail);
    }

    /**
     * Handle the TransferDetail "updated" event.
     *
     * @param  \App\Models\TransferDetail  $transferDetail
     * @return void
     */
    public function updated(TransferDetail $transferDetail)
    {
        //
    }

    /**
     * Handle the TransferDetail "deleted" event.
     *
     * @param  \App\Models\TransferDetail  $transferDetail
     * @return void
     */
    public function deleted(TransferDetail $transferDetail)
    {
        //
    }

    /**
     * Handle the TransferDetail "restored" event.
     *
     * @param  \App\Models\TransferDetail  $transferDetail
     * @return void
     */
    public function restored(TransferDetail $transferDetail)
    {
        //
    }

    /**
     * Handle the TransferDetail "force deleted" event.
     *
     * @param  \App\Models\TransferDetail  $transferDetail
     * @return void
     */
    public function forceDeleted(TransferDetail $transferDetail)
    {
        //
    }
}
