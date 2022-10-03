<?php

namespace App\Models;

/**
 * @OA\Schema(
 *   schema="ConceptType",
 *   type="object",
 *   @OA\Property(
 *       property="name",
 *       type="string",
 *       required={"true"},
 *       description="The ConceptType name"
 *   ),
 *   @OA\Property(
 *       property="description",
 *       type="string",
 *       required={"true"},
 *       description="The ConceptType description"
 *   ),
 *   @OA\Property(
 *       property="sign",
 *       type="string",
 *       required={"true"},
 *       description="The ConceptType sign"
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
class ConceptType extends Base
{
    /**
     * Get the category that owns the ConceptType
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
