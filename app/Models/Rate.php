<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;



/**
     * @OA\Schema(
     *   schema="Rate",
     *   type="object",
     *   @OA\Property(
     *       property="rate",
     *       type="number",
     *       required={"true"},
     *       description="The rate"
     *   ),
     *   @OA\Property(
     *       property="description",
     *       type="string",
     *       required={"true"},
     *       description="Description of rate"
     *   ),
     *   @OA\Property(
     *       property="provider_id",
     *       type="number",
     *       required={"true"},
     *       description="The relational field with provider"
     *   ),
     *   @OA\Property(
     *       property="unit_of_measurement_id",
     *       type="number",
     *       required={"true"},
     *       description="The relational field with unit measurement"
     *   ),
     *   @OA\Property(
     *       property="user_created_id",
     *       type="number",
     *       required={"true"},
     *       example=1,
     *       description="The Provider crete"
     *   ),
     *    @OA\Property(
     *       property="user_updated_id",
     *       type="number",
     *       required={"true"},
     *       example=1,
     *       description="The Provider update"
     *   ),
     * )
     */
class Rate extends Base
{
    use HasFactory;

    /**
     * rate belongs to providers
     */
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    /**
     * rate belongs to UnitsOfMeasurements
     */
    public function unitOfMeasurement(){

        return $this->belongsTo(UnitOfMeasurement::class);
    }

     /**
     * rate belongs to coins
     */
    public function coin(){

        return $this->belongsTo(Coin::class);
    }
}

