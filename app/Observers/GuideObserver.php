<?php

namespace App\Observers;

use App\Models\Guide;

class GuideObserver
{
    /**
     * Handle the Guide "created" event.
     *
     * @param  \App\Models\Guide  $guide
     * @return void
     */
    public function created(Guide $guide)
    {
        $guide->guideDetails()->createMany(request()->guideDetails);
    }

    /**
     * Handle the Guide "updated" event.
     *
     * @param  \App\Models\Guide  $guide
     * @return void
     */
    public function updated(Guide $guide)
    {
        //
    }

    /**
     * Handle the Guide "deleted" event.
     *
     * @param  \App\Models\Guide  $guide
     * @return void
     */
    public function deleted(Guide $guide)
    {
        //
    }

    /**
     * Handle the Guide "restored" event.
     *
     * @param  \App\Models\Guide  $guide
     * @return void
     */
    public function restored(Guide $guide)
    {
        //
    }

    /**
     * Handle the Guide "force deleted" event.
     *
     * @param  \App\Models\Guide  $guide
     * @return void
     */
    public function forceDeleted(Guide $guide)
    {
        //
    }
}
