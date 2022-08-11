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
 *       property="concept_type_id",
 *       type="number",
 *       required={"true"},
 *       description="The Concept concept_type_id"
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

    /**
     * relationship
     */
    public function transactios()
    {
        return $this->hasMany(Transaction::class);
    }
}
