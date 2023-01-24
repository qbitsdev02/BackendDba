<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentEstimationGuide extends Model
{
    protected $fillable = [
        'guide_id',
        'guide_service_cost_id',
        'amount',
        'price',
        'user_created_id',
        'user_updated_id'
    ];

    protected $appends = ['cost'];

    public function getCostAttribute()
    {
        return $this->price * $this->amount;
    }
    /**
     * Get the guide that owns the PaymentEstimationGuide
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function guide()
    {
        return $this->belongsTo(Guide::class);
    }
    /**
     * Get the guideServiceCost that owns the PaymentEstimationGuide
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function guideServiceCost()
    {
        return $this->belongsTo(GuideServiceCost::class);
    }
}
