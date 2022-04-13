<?php

namespace App\Providers;

use App\Models\Beneficiary;
use App\Models\Order;
use App\Models\Responsable;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use App\Models\Role;
use App\Observers\BeneficiaryObserver;
use App\Observers\OrderObserver;
use App\Observers\ResponsableObserver;
use App\Observers\RoleObserver;
use App\Observers\UserObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Role::observe(RoleObserver::class);
        Beneficiary::observe(BeneficiaryObserver::class);
        Responsable::observe(ResponsableObserver::class);
        Order::observe(OrderObserver::class);
    }
}
