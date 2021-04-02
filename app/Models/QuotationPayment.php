<?php

namespace App\Models;

class QuotationPayment extends Base
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

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
     * Get the paymentMethod that owns the QuotationDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }
    /**
     * Get the paymentDestination that owns the QuotationDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentDestination()
    {
        return $this->belongsTo(PaymentDestination::class);
    }
}
