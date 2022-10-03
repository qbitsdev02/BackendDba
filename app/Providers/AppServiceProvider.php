<?php

namespace App\Providers;

use App\Models\Active;
use App\Models\Beneficiary;
use App\Models\Client;
use App\Models\FieldCashFlow;
use App\Models\FieldSupervisor;
use App\Models\Order;
use App\Models\Provider;
use App\Models\Rate;
use App\Models\Responsable;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use App\Models\Role;
use App\Models\Ticket;
use App\Models\Transaction;
use App\Observers\ActiveObserver;
use App\Observers\BeneficiaryObserver;
use App\Observers\ClientObserver;
use App\Observers\FieldCashFlowObserver;
use App\Observers\FieldSupervisorObserver;
use App\Observers\OrderObserver;
use App\Observers\ProviderObserver;
use App\Observers\RateObserver;
use App\Observers\ResponsableObserver;
use App\Observers\RoleObserver;
use App\Observers\TicketObserver;
use App\Observers\TransactionObserver;
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
        FieldSupervisor::observe(FieldSupervisorObserver::class);
        Client::observe(ClientObserver::class);
        Provider::observe(ProviderObserver::class);
        Ticket::observe(TicketObserver::class);
        Active::observe(ActiveObserver::class);
        FieldCashFlow::observe(FieldCashFlowObserver::class);
        Transaction::observe(TransactionObserver::class);

    }
}
