<?php

namespace App\Models;

class Devolution extends Base
{
    /**
     * @OA\Schema(
     *   schema="Devolution",
     *   type="object",
     *   @OA\Property(
     *       property="devolution_reason_id",
     *       type="number",
     *       required={"true"},
     *       description="The Devolution devolution_reason_id"
     *   ),
     *   @OA\Property(
     *       property="branch_office_id",
     *       type="number",
     *       required={"true"},
     *       description="The Devolution branch_office_id"
     *   ),
     *  @OA\Property(
     *       property="devolution_details",
     *       type="array",
     *       required={"true"},
     *       @OA\Items(
     *           @OA\Property(property="product_id", type="number"),
     *           @OA\Property(property="amount", type="number"),
     *           @OA\Property(property="user_created_id", type="number")
     *       ),
     *       description="The Devolution details"
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
     *    @OA\Property(
     *       property="created_at",
     *       type="string",
     *       required={"true"},
     *       example="2020-01-01 12:00:00",
     *       description="date of issue"
     *   ),
     * )
     */

    protected  $appends = ['code'];

    public function getCodeAttribute()
    {
        return "DEV-{$this->id}";
    }
    /**
     * Get all of the devolutionDetails for the Devolution
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function devolutionDetails()
    {
        return $this->hasMany(DevolutionDetail::class);
    }
    /**
     * Get the devolutionReason that owns the Devolution
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function devolutionReason()
    {
        return $this->belongsTo(DevolutionReason::class);
    }
}
