<?php

namespace App\Observers;

use App\Models\BranchOffice;

class BranchOfficeObserver
{
    /**
     * Handle the BranchOffice "created" event.
     *
     * @param  \App\Models\BranchOffice  $branchOffice
     * @return void
     */
    public function created(BranchOffice $branchOffice)
    {
        $branchOffice
            ->series()
            ->createMany(request()->series);
    }

    /**
     * Handle the BranchOffice "updated" event.
     *
     * @param  \App\Models\BranchOffice  $branchOffice
     * @return void
     */
    public function updated(BranchOffice $branchOffice)
    {
        $branchOffice
            ->series()
            ->createMany(request()->series);
    }

    /**
     * Handle the BranchOffice "deleted" event.
     *
     * @param  \App\Models\BranchOffice  $branchOffice
     * @return void
     */
    public function deleted(BranchOffice $branchOffice)
    {
        //
    }

    /**
     * Handle the BranchOffice "restored" event.
     *
     * @param  \App\Models\BranchOffice  $branchOffice
     * @return void
     */
    public function restored(BranchOffice $branchOffice)
    {
        //
    }

    /**
     * Handle the BranchOffice "force deleted" event.
     *
     * @param  \App\Models\BranchOffice  $branchOffice
     * @return void
     */
    public function forceDeleted(BranchOffice $branchOffice)
    {
        //
    }
}
