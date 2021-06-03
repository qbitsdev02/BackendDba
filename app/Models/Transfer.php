<?php

namespace App\Models;

class Transfer extends Base
{
    /**
     * @OA\Schema(
     *   schema="Transfer",
     *   type="object",
     *   @OA\Property(
     *       property="from_warehouse_id",
     *       type="number",
     *       required={"true"},
     *       description="The Transfer from_warehouse_id"
     *   ),
     *   @OA\Property(
     *       property="to_warehouse_id",
     *       type="number",
     *       required={"true"},
     *       description="The Transfer to_warehouse_id"
     *   ),
     *  @OA\Property(
     *       property="transferDetails",
     *       type="array",
     *       required={"true"},
     *       @OA\Items(
     *           @OA\Property(property="product_id", type="number"),
     *           @OA\Property(property="amount", type="number"),
     *           @OA\Property(property="user_created_id", type="number")
     *       ),
     *       description="The Transfer details"
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
    /**
     * Get all of the transferDetails for the Transfer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transferDetails()
    {
        return $this->hasMany(TransferDetail::class);
    }

    /**
     * Get the toWareHouse that owns the Transfer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function toWareHouse()
    {
        return $this->belongsTo(Warehouse::class, 'to_warehouse_id', 'id');
    }

    /**
     * Get the fromWarehouse that owns the Transfer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fromWarehouse()
    {
        return $this->belongsTo(Warehouse::class, 'from_warehouse_id', 'id');
    }
}
