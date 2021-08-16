<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreditNoteDetail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'product_id',
        'amount',
        'price',
        'igv',
        'purchase_price',
        'user_created_id',
        'user_updated_id'
    ];
    /**
     * Get the product for the CreditNoteDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
