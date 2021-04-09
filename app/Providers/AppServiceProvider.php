<?php

namespace App\Providers;

use App\Models\BillElectronic;
use App\Models\Client;
use App\Models\Order;
use Illuminate\Support\ServiceProvider;
use App\Models\Product;
use App\Models\Provider;
use App\Models\Purchase;
use App\Models\Quotation;
use App\Observers\BillElectronicObserver;
use App\Observers\ClientObserver;
use App\Observers\ProductOberver;
use App\Observers\ProviderObserver;
use App\Observers\QuotationObserver;
use App\Models\Seller;
use App\Observers\OrderObserver;
use App\Observers\PurchaseObserver;
use App\Observers\SellerObserver;
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
        Provider::observe(ProviderObserver::class);
        Quotation::observe(QuotationObserver::class);
        Seller::observe(SellerObserver::class);
        Order::observe(OrderObserver::class);
        Purchase::observe(PurchaseObserver::class);
    }
}
