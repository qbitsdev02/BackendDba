<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class BillElectronicGuide extends Pivot
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'guide_id',
        'description',
        'observation',
        'pucharse_order',
        'user_created_id',
        'user_updated_id'
    ];
    /**
     * The attributes that are mass with.
     *
     * @var array
     */
    protected $with = [
        'guide:id,name'
    ];
    /**
     * Get the guide that owns the BillElectronicguidee
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function guide()
    {
        return $this->belongsTo(Guide::class);
    }
}
