<?php

namespace App\Observers;

use App\Models\LotOfGuide;

class LotOfGuideObserver
{
    /**
     * Handle the LotOfGuide "created" event.
     *
     * @param  \App\Models\LotOfGuide  $lotOfGuide
     * @return void
     */
    public function created(LotOfGuide $lotOfGuide)
    {
        $lotOfGuide->guides()->attach(request()->guides);
    }

    /**
     * Handle the LotOfGuide "updated" event.
     *
     * @param  \App\Models\LotOfGuide  $lotOfGuide
     * @return void
     */
    public function updated(LotOfGuide $lotOfGuide)
    {
        $lotOfGuide->guides()->sync(request()->guides);
    }

    /**
     * Handle the LotOfGuide "deleted" event.
     *
     * @param  \App\Models\LotOfGuide  $lotOfGuide
     * @return void
     */
    public function deleted(LotOfGuide $lotOfGuide)
    {
        //
    }

    /**
     * Handle the LotOfGuide "restored" event.
     *
     * @param  \App\Models\LotOfGuide  $lotOfGuide
     * @return void
     */
    public function restored(LotOfGuide $lotOfGuide)
    {
        //
    }

    /**
     * Handle the LotOfGuide "force deleted" event.
     *
     * @param  \App\Models\LotOfGuide  $lotOfGuide
     * @return void
     */
    public function forceDeleted(LotOfGuide $lotOfGuide)
    {
        //
    }
}
