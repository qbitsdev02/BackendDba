<?php

namespace App\Observers;

use App\Models\Active;

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
        $active->attributes()->attach(request()['attributes']);
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
