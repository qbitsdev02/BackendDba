<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethodAttribute extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function paymentOrders()
    {
        return $this->belongsToMany(PaymentOrder::class)
            ->withPivot('value')
            ->withTimestamps();
    }

    /**
     * Get the  that owns the PaymentMethodAttribute
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }
}
