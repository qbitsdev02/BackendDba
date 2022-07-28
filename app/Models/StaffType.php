<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 * @OA\Schema(
 *   schema="StaffType",
 *   type="object",
 *   @OA\Property(
 *       property="name",
 *       type="string",
 *       required={"true"},
 *       description="The name staff type"
 *   ),
 *   @OA\Property(
 *       property="description",
 *       type="string",
 *       required={"false"},
 *       description="The description staff type"
 *   ),
 *  
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
class StaffType extends Base
{
    use HasFactory;

    /**
     * Relationship to personal
     */
    public function personal()
    {
        $this->belongsTo(Personal::class);
    }
}
