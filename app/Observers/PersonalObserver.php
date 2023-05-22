<?php

namespace App\Observers;

use App\Models\Personal;
use App\Services\PersonalService;

class PersonalObserver
{
    /**
     * Handle the Personal "created" event.
     *
     * @param  \App\Models\Personal  $personal
     * @return void
     */
    public function created(Personal $personal)
    {
        $service = new PersonalService();
        $service->saveImages($personal, request()->images);
    }

    /**
     * Handle the Personal "updated" event.
     *
     * @param  \App\Models\Personal  $personal
     * @return void
     */
    public function updated(Personal $personal)
    {
        $service = new PersonalService();
        $service->saveImages($personal, request()->images);
    }

    /**
     * Handle the Personal "deleted" event.
     *
     * @param  \App\Models\Personal  $personal
     * @return void
     */
    public function deleted(Personal $personal)
    {
        //
    }

    /**
     * Handle the Personal "restored" event.
     *
     * @param  \App\Models\Personal  $personal
     * @return void
     */
    public function restored(Personal $personal)
    {
        //
    }

    /**
     * Handle the Personal "force deleted" event.
     *
     * @param  \App\Models\Personal  $personal
     * @return void
     */
    public function forceDeleted(Personal $personal)
    {
        //
    }
}
