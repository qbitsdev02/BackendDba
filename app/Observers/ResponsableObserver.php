<?php

namespace App\Observers;

use App\Helpers\RoleAcronym;
use App\Models\Responsable;
use App\Models\Role;

class ResponsableObserver
{
    /**
     * Handle the Responsable "created" event.
     *
     * @param  \App\Models\Responsable  $responsable
     * @return void
     */
    public function created(Responsable $responsable)
    {
        $responsable->roles()
            ->attach(
                Role::where('acronym', RoleAcronym::RESPONSABLE)->first()->id,
                ['branch_office_id' => 1]
            );
    }

    /**
     * Handle the Responsable "updated" event.
     *
     * @param  \App\Models\Responsable  $responsable
     * @return void
     */
    public function updated(Responsable $responsable)
    {
        //
    }

    /**
     * Handle the Responsable "deleted" event.
     *
     * @param  \App\Models\Responsable  $responsable
     * @return void
     */
    public function deleted(Responsable $responsable)
    {
        //
    }

    /**
     * Handle the Responsable "restored" event.
     *
     * @param  \App\Models\Responsable  $responsable
     * @return void
     */
    public function restored(Responsable $responsable)
    {
        //
    }

    /**
     * Handle the Responsable "force deleted" event.
     *
     * @param  \App\Models\Responsable  $responsable
     * @return void
     */
    public function forceDeleted(Responsable $responsable)
    {
        //
    }
}
