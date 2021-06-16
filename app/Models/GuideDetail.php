<?php

namespace App\Models;

class GuideDetail extends Base
{
    protected $fillable = [
        'product_id',
        'amount',
        'guide_id',
        'user_created_id',
        'user_updated_id'
    ];
    /**
     * Get the product that owns the GuideDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
