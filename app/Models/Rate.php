<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;


class Rate extends Base
{
    use HasFactory;

    /**
     * rate belongs to providers
     */
    public function providers()
    {
        return $this->belongsTo(Provider::class);
    }

    /**
     * rate belongs to UnitsOfMeasurements
     */
    public function unitOfMeasurements(){

        return $this->belongsTo(UnitOfMeasurement::class);
    }
}

