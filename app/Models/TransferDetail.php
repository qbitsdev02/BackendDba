<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferDetail extends Model
{
    protected $fillable = [
        'product_id',
        'amount',
        'user_created_id'
    ];

    /**
     * Get the transfer that owns the TransferDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transfer()
    {
        return $this->belongsTo(Transfer::class);
    }
    /**
     * Get the product that owns the TransferDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class)->withoutAppends();
    }

    public function kardexReports()
    {
        return $this->morphMany(KardexReport::class, 'reportable');
    }
}
