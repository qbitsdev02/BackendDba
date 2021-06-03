<?php

namespace App\Models;

class OrderDetail extends Base
{
    protected $guarded = [];

    /**
     * The attributes that are mass with.
     *
     * @var array
     */
    protected $with = [
        'product:id,name'
    ];

    public function kardexReports()
    {
        return $this->morphMany(KardexReport::class, 'reportable');
    }
    /**
     * Get the product that owns the QuotationDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
