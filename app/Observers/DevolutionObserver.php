<?php

namespace App\Observers;

use App\Models\Devolution;

class DevolutionObserver
{
    /**
     * Handle the Devolution "created" event.
     *
     * @param  \App\Models\Devolution  $devolution
     * @return void
     */
    public function created(Devolution $devolution)
    {
        if (request()->devolution_details) {
            $devolution
                ->devolutionDetails()
                ->createMany(request()->devolution_details);
        }
    }

    /**
     * Handle the Devolution "updated" event.
     *
     * @param  \App\Models\Devolution  $devolution
     * @return void
     */
    public function updated(Devolution $devolution)
    {
        //
    }

    /**
     * Handle the Devolution "deleted" event.
     *
     * @param  \App\Models\Devolution  $devolution
     * @return void
     */
    public function deleted(Devolution $devolution)
    {
        //
    }

    /**
     * Handle the Devolution "restored" event.
     *
     * @param  \App\Models\Devolution  $devolution
     * @return void
     */
    public function restored(Devolution $devolution)
    {
        //
    }

    /**
     * Handle the Devolution "force deleted" event.
     *
     * @param  \App\Models\Devolution  $devolution
     * @return void
     */
    public function forceDeleted(Devolution $devolution)
    {
        //
    }
}
