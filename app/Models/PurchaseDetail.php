<?php

namespace App\Models;
class PurchaseDetail extends Base
{
    protected $fillable = [
        'product_id',
        'purchase_id',
        'warehouse_id',
        'amount',
        'sale_price',
        'purchase_price',
        'discount',
        'igv',
        'user_created_id'
    ];

    public function kardexReports()
    {
        return $this->morphMany(KardexReport::class, 'reportable');
    }
    /**
     * Get the product that owns the PurchaseDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class)->withoutAppends();
    }
}
