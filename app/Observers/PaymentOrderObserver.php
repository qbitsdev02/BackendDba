<?php

namespace App\Observers;

use App\Models\PaymentOrder;

class PaymentOrderObserver
{
    /**
     * Handle the PaymentOrder "created" event.
     *
     * @param  \App\Models\PaymentOrder  $paymentOrder
     * @return void
     */
    public function created(PaymentOrder $paymentOrder)
    {
        info(request()->all());
        collect(request()->payment_method_attributes)->each(function ($attribute) use ($paymentOrder) {
            collect($attribute)->each(function ($att) use ($paymentOrder) {
                $paymentOrder->paymentMethodAttributes()->attach(
                    $att['attribute_id'],
                    [
                        'value' => $att['value'],
                        'user_created_id' => $paymentOrder->user_created_id,

                    ]
                );
            });
        });
    }

    /**
     * Handle the PaymentOrder "updated" event.
     *
     * @param  \App\Models\PaymentOrder  $paymentOrder
     * @return void
     */
    public function updated(PaymentOrder $paymentOrder)
    {
        //
    }

    /**
     * Handle the PaymentOrder "deleted" event.
     *
     * @param  \App\Models\PaymentOrder  $paymentOrder
     * @return void
     */
    public function deleted(PaymentOrder $paymentOrder)
    {
        //
    }

    /**
     * Handle the PaymentOrder "restored" event.
     *
     * @param  \App\Models\PaymentOrder  $paymentOrder
     * @return void
     */
    public function restored(PaymentOrder $paymentOrder)
    {
        //
    }

    /**
     * Handle the PaymentOrder "force deleted" event.
     *
     * @param  \App\Models\PaymentOrder  $paymentOrder
     * @return void
     */
    public function forceDeleted(PaymentOrder $paymentOrder)
    {
        //
    }
}
