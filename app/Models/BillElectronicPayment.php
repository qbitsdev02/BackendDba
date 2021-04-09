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
    /**
     * The attributes that are mass with.
     *
     * @var array
     */
    protected $with = [
        'paymentMethod:id,name',
        'paymentDestination:id,name'
    ];
    /**
     * Get the paymentMethod that owns the BillElectronicPayment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }
    /**
     * Get the paymentDestination that owns the BillElectronicPayment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentDestination()
    {
        return $this->belongsTo(PaymentDestination::class);
    }
}