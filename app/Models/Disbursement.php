<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *   schema="Disbursement",
 *   type="object",
 *   @OA\Property(
 *       property="from_branch_office_id",
 *       type="number",
 *       required={"true"},
 *       description="from_branch_office"
 *   ),
 *  @OA\Property(
 *       property="to_branch_office_id",
 *       type="number",
 *       required={"true"},
 *       description="to_branch_office"
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
 *       description="The Users create"
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
class Disbursement extends Base
{
    use HasFactory;

    /**
     * Get the branchOffice that owns the Disbursement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function branchOffice()
    {
        return $this->belongsTo(BranchOffice::class);
    }
}
