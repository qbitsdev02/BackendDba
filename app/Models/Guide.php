<?php

namespace App\Models;

/**
 * @OA\Schema(
 *   schema="Guide",
 *   type="object",
 *   @OA\Property(
 *       property="material_supplier_id",
 *       type="string",
 *       required={"true"},
 *       description="The Guide material_supplier_id"
 *   ),
 *   @OA\Property(
 *       property="client_id",
 *       type="string",
 *       required={"true"},
 *       description="The Guide client_id"
 *   ),
 *   @OA\Property(
 *       property="vehicle_id",
 *       type="string",
 *       required={"true"},
 *       description="The Guide vehicle_id"
 *   ),
 *   @OA\Property(
 *       property="trailer_id",
 *       type="string",
 *       required={"true"},
 *       description="The Guide trailer_id"
 *   ),
 *   @OA\Property(
 *       property="driver_id",
 *       type="string",
 *       required={"true"},
 *       description="The Guide driver_id"
 *   ),
 *   @OA\Property(
 *       property="start_date",
 *       type="string",
 *       required={"true"},
 *       description="The Guide start_date"
 *   ),
 *   @OA\Property(
 *       property="deadline",
 *       type="string",
 *       required={"true"},
 *       description="The Guide deadline"
 *   ),
 *   @OA\Property(
 *       property="origin_address",
 *       type="string",
 *       required={"true"},
 *       description="The Guide origin_address"
 *   ),
 *   @OA\Property(
 *       property="destination_address",
 *       type="string",
 *       required={"true"},
 *       description="The Guide destination_address"
 *   ),
 *   @OA\Property(
 *       property="material",
 *       type="string",
 *       required={"true"},
 *       description="The Guide material"
 *   ),
 *   @OA\Property(
 *       property="code_runpa",
 *       type="string",
 *       required={"true"},
 *       description="The Guide code_runpa"
 *   ),
 *   @OA\Property(
 *       property="user_created_id",
 *       type="number",
 *       required={"true"},
 *       example=1,
 *       description="The Users crete"
 *   ),
 *    @OA\Property(
 *       property="user_updated_id",
 *       type="number",
 *       required={"true"},
 *       example=1,
 *       description="The Users update"
 *   ),
 * )
 */
class Guide extends Base
{
    protected $appends = ['full_name', 'payments_estimate', 'cost_total_services', 'net_weight'];

    public function getFullNameAttribute()
    {
        return "{$this->code_runpa}-{$this->material}";
    }
    /**
     * Payment estimate
     */
    public function getPaymentsEstimateAttribute()
    {
        return $this->paymentEstimationGuides->sum('cost');
    }
    /**
     * Payment services
     */
    public function getCostTotalServicesAttribute()
    {
        return $this->guideServiceCosts->sum(function ($cost) {
            return $cost->pivot->price * $this->net_weight;
        });
    }

    public function scopeIfNotEstimate($query, $ifNotEstimate)
    {
        if ($ifNotEstimate) {
            return $query->doesntHave('lotOfGuides');
        }
    }

    public function scopeIfNotTicket($query, $ifNotTicket)
    {
        if ($ifNotTicket) {
            return $query->doesntHave('ticket');
        }
    }

    public function scopeIfNotPrice($query, $ifNotPrice)
    {
        if ($ifNotPrice) {
            return $query->doesntHave('guideServiceCosts');
        }
    }

    public function getNetWeightAttribute()
    {
        if ($this->ticket) {
            return $this->ticket->net_weight;
        }
        return 0;
    }
    /**
     * Get the provider that owns the Guide
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
    /**
     * Get the trailer that owns the Guide
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function trailer()
    {
        return $this->belongsTo(Active::class)->withTrashed();
    }
    /**
     * Get the client that owns the Guide
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class)->withTrashed();
    }
    /**
     * Get the vehicle that owns the Guide
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehicle()
    {
        return $this->belongsTo(Active::class)->withTrashed();
    }
    /**
     * Get the driver that owns the Guide
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function driver()
    {
        return $this->belongsTo(Personal::class)->withTrashed();
    }

    public function swornDeclarations()
    {
        return $this->hasMany(SwornDeclaration::class);
    }

    public function unitOfMeasurement()
    {
        return $this->belongsTo(UnitOfMeasurement::class);
    }
    /**
     * Relationship ticket
     * A guide has many ticket
     *
     * Get the ticket associated to the guide
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ticket()
    {
        return $this->hasOne(Ticket::class);
    }
    /**
     *
     */
    public function fieldCashFlows()
    {
        return $this->hasMany(FieldCashFlow::class);
    }
    /**
     * Morph many
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    /**
     * The guideServiceCosts that belong to the Guide
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function guideServiceCosts()
    {
        return $this->belongsToMany(GuideServiceCost::class)
            ->withPivot('price');
    }
    /**
     * Get the paymentEstimationGuides that owns the Guide
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentEstimationGuides()
    {
        return $this->hasMany(PaymentEstimationGuide::class);
    }

    /**
     * Get all of the guideOwners for the Guide
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function guideOwner()
    {
        return $this->hasOne(GuideOwner::class);
    }
    /*
    * Get all of the guides for the LotOfGuide
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
   public function lotOfGuides()
   {
       return $this->belongsToMany(LotOfGuide::class);
   }
}
