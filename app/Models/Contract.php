<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @OA\Schema(
 *   schema="Contract",
 *   type="object",
 *   @OA\Property(
 *       property="name",
 *       type="string",
 *       required={"true"},
 *       description="The name"
 *   ),
 *   @OA\Property(
 *       property="description",
 *       type="string",
 *       required={"false"},
 *       description="description"
 *   ),
 * @OA\Property(
 *       property="organization_id",
 *       type="number",
 *       required={"true"},
 *       example=1,
 *       description="The organization_id"
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
class Contract extends Base
{
    use HasFactory;

    /**
     * Get the organization that owns the Contract
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
