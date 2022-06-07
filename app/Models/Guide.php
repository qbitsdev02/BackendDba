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
    /**
     * Get the client that owns the Guide
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    /**
     * Get the materialSupplier that owns the Guide
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function materialSupplier()
    {
        return $this->belongsTo(MaterialSupplier::class);
    }
    /**
     * Get the trailer that owns the Guide
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function trailer()
    {
        return $this->belongsTo(Trailer::class);
    }
    /**
     * Get the vehicle that owns the Guide
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
    /**
     * Get the driver that owns the Guide
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function swornDeclarations()
    {
        return $this->hasMany(SwornDeclaration::class);
    }
    
    public function unitOfMeasurement()
    {
        return $this->belongsTo(UnitOfMeasurement::class);
    }
}
