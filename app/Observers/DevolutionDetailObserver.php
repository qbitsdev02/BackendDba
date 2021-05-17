<?php

namespace App\Observers;

use App\Models\DevolutionDetail;
use App\Services\KardexReportService;

class DevolutionDetailObserver
{
    /**
     * Handle the DevolutionDetail "created" event.
     *
     * @param  \App\Models\DevolutionDetail  $devolutionDetail
     * @return void
     */
    public function created(DevolutionDetail $devolutionDetail)
    {
        $kardexServices = new KardexReportService();
        $kardexServices->saveKardexReport($devolutionDetail);
    }

    /**
     * Handle the DevolutionDetail "updated" event.
     *
     * @param  \App\Models\DevolutionDetail  $devolutionDetail
     * @return void
     */
    public function updated(DevolutionDetail $devolutionDetail)
    {
        //
    }

    /**
     * Handle the DevolutionDetail "deleted" event.
     *
     * @param  \App\Models\DevolutionDetail  $devolutionDetail
     * @return void
     */
    public function deleted(DevolutionDetail $devolutionDetail)
    {
        //
    }

    /**
     * Handle the DevolutionDetail "restored" event.
     *
     * @param  \App\Models\DevolutionDetail  $devolutionDetail
     * @return void
     */
    public function restored(DevolutionDetail $devolutionDetail)
    {
        //
    }

    /**
     * Handle the DevolutionDetail "force deleted" event.
     *
     * @param  \App\Models\DevolutionDetail  $devolutionDetail
     * @return void
     */
    public function forceDeleted(DevolutionDetail $devolutionDetail)
    {
        //
    }
}
