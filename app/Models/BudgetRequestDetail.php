<?php

namespace App\Models;

class BudgetRequestDetail extends Base
{
    protected $guarded = [];

    /**
     * Get the product that owns the BudgetRequestDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
