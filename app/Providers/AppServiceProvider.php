<?php

namespace App\Providers;

use App\Models\BillElectronic;
use App\Models\Client;
use Illuminate\Support\ServiceProvider;
use App\Models\Product;
use App\Observers\BillElectronicObserver;
use App\Observers\ClientObserver;
use App\Observers\ProductOberver;
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
        Product::observe(ProductOberver::class);
        BillElectronic::observe(BillElectronicObserver::class);
        Client::observe(ClientObserver::class);
    }
}
