<?php

namespace App\Models;

class LotOfGuide extends Base
{
    protected $appends = ['payments_estimate'];

    /**
     * Payment estimate
     */
    public function getPaymentsEstimateAttribute()
    {
        return $this->guides->sum('payments_estimate');
    }
    /**
     * Get all of the guides for the LotOfGuide
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function guides()
    {
        return $this->belongsToMany(Guide::class);
    }
}
