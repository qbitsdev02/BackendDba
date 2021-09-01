<?php

namespace App\Models;
use App\Helpers\Calculate;
class PurchasePayment extends Base
{
    protected $guarded = [];

    protected $appends = ['type'];

    /**
     * The attributes that are mass with.
     *
     * @var array
     */
    protected $with = [
        'paymentMethod:id,name',
        'paymentDestination:id,name'
    ];

    public function getTypeAttribute()
    {
        return 'COMPRA';
    }
    /**
     * Get the purchase that owns the PurchasePayment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }

    /**
     * Get the paymentMethod that owns the PurchasePayment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    /**
     * Get the paymentDestination that owns the PurchasePayment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentDestination()
    {
        return $this->belongsTo(PaymentDestination::class);
    }
    /**
     * Get the coin that owns the BillElectronicPayment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function coin()
    {
        return $this->belongsTo(Coin::class);
    }
}
