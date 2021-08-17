<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class OrderDetail extends Model
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
     * The attributes that are mass with.
     *
     * @var array
     */
    protected $with = [
        'product:id,name,description'
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
        return $this->belongsTo(Product::class)->withoutAppends();
    }
}
