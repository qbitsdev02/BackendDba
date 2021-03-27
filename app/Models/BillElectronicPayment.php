<?php

namespace App\Models;

class BillElectronicPayment extends Base
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'payment_method_id',
        'payment_destination_id',
        'reference',
        'amount',
        'user_created_id',
        'user_updated_id'
    ];
}
