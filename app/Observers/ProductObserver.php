<?php

namespace App\Observers;

use App\Models\Product;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function created(Product $product)
    {
        if (request()->attribute_types) {
            $product
                ->attributeTypes()
                ->attach(request()->attribute_types);
        }

        if (request()->product_prices) {
            $product
                ->productPrices()
                ->createMany(request()->product_prices);
        }
    }

    /**
     * Handle the Product "updated" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function updated(Product $product)
    {
        if (request()->attribute_types) {
            $product
                ->attributeTypes()
                ->sync(request()->attribute_types);
        }
        if (request()->product_prices) {
            $product
                ->productPrices()
                ->delete();

            $product
                ->productPrices()
                ->createMany(request()->product_prices);
        }
    }

    /**
     * Handle the Product "deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function deleted(Product $product)
    {
        //
    }

    /**
     * Handle the Product "restored" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function restored(Product $product)
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        //
    }
}
