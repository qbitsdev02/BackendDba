<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 * @OA\Schema(
 *   schema="Attribute",
 *   type="object",
 *   @OA\Property(
 *       property="name",
 *       type="string",
 *       required={"true"},
 *       description="The name active"
 *   ),
 *   @OA\Property(
 *       property="description",
 *       type="string",
 *       required={"true"},
 *       description="description active"
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
class Attribute extends Base
{
    use HasFactory;

    /**
     * Relationship active
     */
    public function actives()
    {
        return $this->belongsToMany(Active::class,"active_attribute")
            ->withPivot('valor');
    }
}
