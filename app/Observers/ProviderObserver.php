<?php

namespace App\Observers;

use App\Models\Provider;
use App\Models\Role;
use App\Helpers\RoleAcronym;
class ProviderObserver
{
    /**
     * Handle the Provider "created" event.
     *
     * @param  \App\Models\Provider  $provider
     * @return void
     */
    public function created(Provider $provider)
    {
        $provider->roles()->attach(
            Role::where('acronym', RoleAcronym::PROVIDER)->first()->id,
            [
                'user_created_id' => $provider->user_created_id
            ]
        );
    }

    /**
     * Handle the Provider "updated" event.
     *
     * @param  \App\Models\Provider  $provider
     * @return void
     */
    public function updated(Provider $provider)
    {
        //
    }

    /**
     * Handle the Provider "deleted" event.
     *
     * @param  \App\Models\Provider  $provider
     * @return void
     */
    public function deleted(Provider $provider)
    {
        //
    }

    /**
     * Handle the Provider "restored" event.
     *
     * @param  \App\Models\Provider  $provider
     * @return void
     */
    public function restored(Provider $provider)
    {
        //
    }

    /**
     * Handle the Provider "force deleted" event.
     *
     * @param  \App\Models\Provider  $provider
     * @return void
     */
    public function forceDeleted(Provider $provider)
    {
        //
    }
}
