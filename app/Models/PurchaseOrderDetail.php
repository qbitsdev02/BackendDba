<?php

namespace App\Models;

class PurchaseOrderDetail extends Base
{
    protected $guarded = [];

    /**
     * Get the product that owns the PurchaseOrderDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
