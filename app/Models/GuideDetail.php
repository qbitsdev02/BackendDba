<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuideDetail extends Model
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
        return $this->belongsTo(Product::class)->withoutAppends();
    }
}
