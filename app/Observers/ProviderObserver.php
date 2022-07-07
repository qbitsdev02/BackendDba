<?php

namespace App\Observers;

use App\Models\Provider;

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
        //$user->roles()->attach(request()->role);
        $provider->providerTypes()->attach(request()->providerType);
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
