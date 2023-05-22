<?php

namespace App\Observers;

use App\Models\PaymentMethod;

class PaymentMethodObserver
{
    /**
     * Handle the PaymentMethod "created" event.
     *
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return void
     */
    public function created(PaymentMethod $paymentMethod)
    {
        collect(request()['attributes'])->each(function ($attribute) use ($paymentMethod) {
            $paymentMethod->attributes()->create(
                $attribute,
            );
        });
    }

    /**
     * Handle the PaymentMethod "updated" event.
     *
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return void
     */
    public function updated(PaymentMethod $paymentMethod)
    {
        //
    }

    /**
     * Handle the PaymentMethod "deleted" event.
     *
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return void
     */
    public function deleted(PaymentMethod $paymentMethod)
    {
        //
    }

    /**
     * Handle the PaymentMethod "restored" event.
     *
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return void
     */
    public function restored(PaymentMethod $paymentMethod)
    {
        //
    }

    /**
     * Handle the PaymentMethod "force deleted" event.
     *
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return void
     */
    public function forceDeleted(PaymentMethod $paymentMethod)
    {
        //
    }
}
