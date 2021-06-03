<?php

namespace App\Providers;

use App\Models\BillElectronic;
use App\Models\BillElectronicDetail;
use App\Models\Client;
use App\Models\Devolution;
use App\Models\DevolutionDetail;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use App\Models\Product;
use App\Models\Provider;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use App\Models\Quotation;
use App\Observers\BillElectronicObserver;
use App\Observers\ClientObserver;
use App\Observers\ProductOberver;
use App\Observers\ProviderObserver;
use App\Observers\QuotationObserver;
use App\Models\Seller;
use App\Models\Transfer;
use App\Models\TransferDetail;
use App\Observers\BillElectronicDetailObserver;
use App\Observers\DevolutionObserver;
use App\Observers\OrderObserver;
use App\Observers\PurchaseObserver;
use App\Observers\SellerObserver;
use App\Observers\DevolutionDetailObserver;
use App\Observers\OrderDetailObserver;
use App\Observers\PurchaseDetailObserver;
use App\Observers\TransferDetailObserver;
use App\Observers\TransferObserver;
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
        Product::observe(ProductOberver::class);
        BillElectronic::observe(BillElectronicObserver::class);
        Client::observe(ClientObserver::class);
        Provider::observe(ProviderObserver::class);
        Quotation::observe(QuotationObserver::class);
        Seller::observe(SellerObserver::class);
        Order::observe(OrderObserver::class);
        Purchase::observe(PurchaseObserver::class);
        BillElectronicDetail::observe(BillElectronicDetailObserver::class);
        Devolution::observe(DevolutionObserver::class);
        DevolutionDetail::observe(DevolutionDetailObserver::class);
        PurchaseDetail::observe(PurchaseDetailObserver::class);
        User::observe(UserObserver::class);
        Transfer::observe(TransferObserver::class);
        TransferDetail::observe(TransferDetailObserver::class);
        OrderDetail::observe(OrderDetailObserver::class);
    }
}
