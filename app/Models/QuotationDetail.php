<?php

namespace App\Models;

class QuotationDetail extends Base
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
        'product:id,name'
    ];
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
