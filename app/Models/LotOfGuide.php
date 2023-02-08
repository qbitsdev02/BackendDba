<?php

namespace App\Models;

class LotOfGuide extends Base
{
    protected $appends = ['payments_estimate', 'total_cost_services', 'total_net_weight'];

    /**
     * Payment estimate
     */
    public function getPaymentsEstimateAttribute()
    {
        return $this->guides->sum('payments_estimate');
    }
    /**
     * Cost services guide
     */
    public function getTotalCostServicesAttribute()
    {
        return $this->guides->sum('cost_total_services');
    }
    /**
     * Cost services guide
     */
    public function getTotalNetWeightAttribute()
    {
        return $this->guides->sum('net_weight');
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
