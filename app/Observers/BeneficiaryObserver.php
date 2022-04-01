<?php

namespace App\Observers;

use App\Helpers\RoleAcronym;
use App\Models\Beneficiary;
use App\Models\Role;

class BeneficiaryObserver
{
    /**
     * Handle the Beneficiary "created" event.
     *
     * @param  \App\Models\Beneficiary  $beneficiary
     * @return void
     */
    public function created(Beneficiary $beneficiary)
    {
        $beneficiary->roles()
            ->attach(
                Role::where('acronym', RoleAcronym::BNFCR)->first()->id,
                ['branch_office_id' => 1]
            );
    }

    /**
     * Handle the Beneficiary "updated" event.
     *
     * @param  \App\Models\Beneficiary  $beneficiary
     * @return void
     */
    public function updated(Beneficiary $beneficiary)
    {
        //
    }

    /**
     * Handle the Beneficiary "deleted" event.
     *
     * @param  \App\Models\Beneficiary  $beneficiary
     * @return void
     */
    public function deleted(Beneficiary $beneficiary)
    {
        //
    }

    /**
     * Handle the Beneficiary "restored" event.
     *
     * @param  \App\Models\Beneficiary  $beneficiary
     * @return void
     */
    public function restored(Beneficiary $beneficiary)
    {
        //
    }

    /**
     * Handle the Beneficiary "force deleted" event.
     *
     * @param  \App\Models\Beneficiary  $beneficiary
     * @return void
     */
    public function forceDeleted(Beneficiary $beneficiary)
    {
        //
    }
}
