<?php

namespace App\Observers;

use App\Models\Guide;
use App\Services\GuideService;

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
        $services = new GuideService();
        $services->saveImages($guide, request()->images);
    }

    /**
     * Handle the Guide "updated" event.
     *
     * @param  \App\Models\Guide  $guide
     * @return void
     */
    public function updated(Guide $guide)
    {
        $services = new GuideService();
        $services->saveCosts($guide, request()->costs);
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
