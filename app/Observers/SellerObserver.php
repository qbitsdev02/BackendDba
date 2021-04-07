<?php

namespace App\Observers;

use App\Helpers\RoleAcronym;
use App\Models\Seller;
use App\Models\Role;
class SellerObserver
{
    /**
     * Handle the Seller "created" event.
     *
     * @param  \App\Models\Seller  $seller
     * @return void
     */
    public function created(Seller $seller)
    {
        $seller->roles()->attach(
            Role::where('acronym', RoleAcronym::SELLER)->first()->id,
            [
                'branch_office_id' => request()->branch_office_id ?? 1,
                'user_created_id' => $seller->user_created_id
            ]
        );
    }

    /**
     * Handle the Seller "updated" event.
     *
     * @param  \App\Models\Seller  $seller
     * @return void
     */
    public function updated(Seller $seller)
    {
        //
    }

    /**
     * Handle the Seller "deleted" event.
     *
     * @param  \App\Models\Seller  $seller
     * @return void
     */
    public function deleted(Seller $seller)
    {
        //
    }

    /**
     * Handle the Seller "restored" event.
     *
     * @param  \App\Models\Seller  $seller
     * @return void
     */
    public function restored(Seller $seller)
    {
        //
    }

    /**
     * Handle the Seller "force deleted" event.
     *
     * @param  \App\Models\Seller  $seller
     * @return void
     */
    public function forceDeleted(Seller $seller)
    {
        //
    }
}
