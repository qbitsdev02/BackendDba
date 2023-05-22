<?php

namespace App\Models;

class Bank extends Base
{
    protected $guarded = [];


    /**
     * Get all of the comments for the Bank
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paymentOrders()
    {
        return $this->hasMany(PaymentOrder::class);
    }
}
