<?php

namespace App\Models;
/**
 * @OA\Schema(
 *   schema="Warehouse",
 *   type="object",
 *   @OA\Property(
 *       property="description",
 *       type="string",
 *       required={"true"},
 *       description="The Warehouse description"
 *   ),
 *   @OA\Property(
 *       property="branch_office_id",
 *       type="string",
 *       required={"true"},
 *       description="The Warehouse branch_office_id"
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
class Warehouse extends Base
{
    public static $filterable = [];

    /**
     * Get the branchOffice that owns the Warehouse
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function branchOffice()
    {
        return $this->belongsTo(BranchOffice::class);
    }
    /**
     * Get all of the purchaseDetails for the Warehouse
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchaseDetails()
    {
        return $this->hasMany(PurchaseDetail::class);
    }
    /**
     * Get all of the inventories for the Warehouse
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
}
