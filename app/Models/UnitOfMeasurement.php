<?php

namespace App\Models;
/**
 * @OA\Schema(
 *   schema="UnitOfMeasurement",
 *   type="object",
 *   @OA\Property(
 *       property="name",
 *       type="string",
 *       required={"true"},
 *       description="The Unit Of Measurement name"
 *   ),
 *   @OA\Property(
 *       property="acronym",
 *       type="string",
 *       required={"true"},
 *       description="The Unit Of Measurement acronym"
 *   ),
 *   @OA\Property(
 *       property="user_created_id",
 *       type="number",
 *       required={"true"},
 *       example=1,
 *       description="The UnitOfMeasurements crete"
 *   ),
 *    @OA\Property(
 *       property="user_updated_id",
 *       type="number",
 *       required={"true"},
 *       example=1,
 *       description="The UnitOfMeasurements update"
 *   ),
 * )
 */
class UnitOfMeasurement extends Base
{
    protected $appends = ['full_name'];

    public function getFullNameAttribute()
    {
        return "{$this->name} ({$this->acronym})";
    }


    /**
     * Relations wiht many rates 
     */
    public function rates(){

        return $this->hasMany(Rate::class);

    }
}
