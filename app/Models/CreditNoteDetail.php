<?php

namespace App\Models;

class CreditNoteDetail extends Base
{
    protected $guarded = [];

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
