<?php

namespace App\Observers;

use App\Models\Active;
use App\Services\ActiveService;

class ActiveObserver
{
    /**
     * Handle the Active "created" event.
     *
     * @param  \App\Models\Active  $active
     * @return void
     */
    public function created(Active $active)
    {
        $service = new ActiveService();
        $service->saveAttribute($active, request()['attributes']);
        $service->saveImages($active, request()['images']);
    }

    /**
     * Handle the Active "updated" event.
     *
     * @param  \App\Models\Active  $active
     * @return void
     */
    public function updated(Active $active)
    {
        $active->attributes()->sync(request()['attributes']);
    }

    /**
     * Handle the Active "deleted" event.
     *
     * @param  \App\Models\Active  $active
     * @return void
     */
    public function deleted(Active $active)
    {
        //
    }

    /**
     * Handle the Active "restored" event.
     *
     * @param  \App\Models\Active  $active
     * @return void
     */
    public function restored(Active $active)
    {
        //
    }

    /**
     * Handle the Active "force deleted" event.
     *
     * @param  \App\Models\Active  $active
     * @return void
     */
    public function forceDeleted(Active $active)
    {
        //
    }
}
