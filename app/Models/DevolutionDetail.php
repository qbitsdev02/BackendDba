<?php

namespace App\Models;
class DevolutionDetail extends Base
{
    protected $fillable = [
        'product_id',
        'amount',
        'devolution_id',
        'user_created_id',
        'user_updated_id'
    ];

    /**
     * Get the product that owns the DevolutionDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    /**
     * Get the devolution that owns the DevolutionDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function devolution()
    {
        return $this->belongsTo(Devolution::class);
    }

    public function kardexReports()
    {
        return $this->morphMany(KardexReport::class, 'reportable');
    }
}