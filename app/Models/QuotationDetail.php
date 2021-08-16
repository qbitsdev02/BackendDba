<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuotationDetail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quotation_id',
        'product_id',
        'amount',
        'price',
        'igv',
        'purchase_price',
        'user_created_id',
        'user_updated_id',
        'extra_attribute',
        'extra_attribute_description'
    ];
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
