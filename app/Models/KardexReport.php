<?php

namespace App\Models;

class KardexReport extends Base
{
    //
    protected $fillable = ['stock', 'user_created_id', 'product_id', 'user_updated_id'];

    protected $casts = [
        'stock' => 'array',
    ];

    public function reportable()
    {
        return $this->morphTo();
    }

    /**
     * Get the product that owns the KardexReport
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
