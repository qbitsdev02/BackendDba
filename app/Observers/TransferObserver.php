<?php

namespace App\Observers;

use App\Models\Transfer;

class TransferObserver
{
    /**
     * Handle the Transfer "created" event.
     *
     * @param  \App\Models\Transfer  $transfer
     * @return void
     */
    public function created(Transfer $transfer)
    {
        $transfer
            ->transferDetails()
            ->createMany(request()->transferDetails);
    }

    /**
     * Handle the Transfer "updated" event.
     *
     * @param  \App\Models\Transfer  $transfer
     * @return void
     */
    public function updated(Transfer $transfer)
    {
        //
    }

    /**
     * Handle the Transfer "deleted" event.
     *
     * @param  \App\Models\Transfer  $transfer
     * @return void
     */
    public function deleted(Transfer $transfer)
    {
        //
    }

    /**
     * Handle the Transfer "restored" event.
     *
     * @param  \App\Models\Transfer  $transfer
     * @return void
     */
    public function restored(Transfer $transfer)
    {
        //
    }

    /**
     * Handle the Transfer "force deleted" event.
     *
     * @param  \App\Models\Transfer  $transfer
     * @return void
     */
    public function forceDeleted(Transfer $transfer)
    {
        //
    }
}
