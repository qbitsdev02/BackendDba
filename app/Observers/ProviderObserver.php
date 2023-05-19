<?php

namespace App\Observers;

use App\Models\Provider;
use App\Services\ProviderService;

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
        $service = new ProviderService();
        $service
            ->saveImages($provider, request()->images)
            ->saveProviderTypes($provider, request()->providerType);
    }

    /**
     * Handle the Provider "updated" event.
     *
     * @param  \App\Models\Provider  $provider
     * @return void
     */
    public function updated(Provider $provider)
    {
        $provider->providerTypes()->attach(request()->providerType);
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
