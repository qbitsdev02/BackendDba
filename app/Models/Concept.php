<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *   schema="Concept",
 *   type="object",
 *   @OA\Property(
 *       property="name",
 *       type="string",
 *       required={"true"},
 *       description="The Concept name"
 *   ),
 *   @OA\Property(
 *       property="description",
 *       type="string",
 *       required={"true"},
 *       description="The Concept description"
 *   ),
 *   @OA\Property(
 *       property="sign",
 *       type="string",
 *       required={"true"},
 *       description="The Concept sign"
 *   ),
 *   @OA\Property(
 *       property="conceptType_created_id",
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
class Concept extends Base
{
    /**
     * Get the conceptType that owns the Concept
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function conceptType()
    {
        return $this->belongsTo(ConceptType::class);
    }
}
