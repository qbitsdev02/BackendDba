<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @OA\Schema(
 *   schema="DisbursementRequest",
 *   type="object",
 *   @OA\Property(
 *       property="coin_id",
 *       type="number",
 *       required={"true"},
 *       description="The coin_id"
 *   ),
 *   @OA\Property(
 *       property="request_branch_office_id",
 *       type="number",
 *       required={"true"},
 *       description="The request_branch_office_id"
 *   ),
 *   @OA\Property(
 *       property="amount",
 *       type="number",
 *       required={"true"},
 *       description="amount"
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
 * */
class DisbursementRequest extends Base
{
    use HasFactory;

    /**
     * Get the coin that owns the DisbursementRequest
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function coin()
    {
        return $this->belongsTo(Coin::class);
    }

    /**
     * Get the branchOffice that owns the DisbursementRequest
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function branchOffice()
    {
        return $this->belongsTo(BranchOffice::class);
    }
}
