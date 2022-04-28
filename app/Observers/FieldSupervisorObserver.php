<?php

namespace App\Observers;

use App\Helpers\RoleAcronym;
use App\Models\FieldSupervisor;
use App\Models\Role;

class FieldSupervisorObserver
{
    /**
     * Handle the FieldSupervisor "created" event.
     *
     * @param  \App\Models\FieldSupervisor  $fieldSupervisor
     * @return void
     */
    public function created(FieldSupervisor $fieldSupervisor)
    {
        $fieldSupervisor->roles()
            ->attach(
                Role::where('acronym', RoleAcronym::FS)->first()->id,
                ['branch_office_id' => 1]
            );
    }

    /**
     * Handle the FieldSupervisor "updated" event.
     *
     * @param  \App\Models\FieldSupervisor  $fieldSupervisor
     * @return void
     */
    public function updated(FieldSupervisor $fieldSupervisor)
    {
        //
    }

    /**
     * Handle the FieldSupervisor "deleted" event.
     *
     * @param  \App\Models\FieldSupervisor  $fieldSupervisor
     * @return void
     */
    public function deleted(FieldSupervisor $fieldSupervisor)
    {
        //
    }

    /**
     * Handle the FieldSupervisor "restored" event.
     *
     * @param  \App\Models\FieldSupervisor  $fieldSupervisor
     * @return void
     */
    public function restored(FieldSupervisor $fieldSupervisor)
    {
        //
    }

    /**
     * Handle the FieldSupervisor "force deleted" event.
     *
     * @param  \App\Models\FieldSupervisor  $fieldSupervisor
     * @return void
     */
    public function forceDeleted(FieldSupervisor $fieldSupervisor)
    {
        //
    }
}
