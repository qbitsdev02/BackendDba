<?php

namespace App\Models;

/**
 * @OA\Schema(
 *   schema="Field",
 *   type="object",
 *   @OA\Property(
 *       property="denomination",
 *       type="string",
 *       required={"true"},
 *       description="The Field denomination"
 *   ),
 *   @OA\Property(
 *       property="acronym",
 *       type="string",
 *       required={"true"},
 *       description="The Field acronym"
 *   ),
 *   @OA\Property(
 *       property="address",
 *       type="string",
 *       required={"true"},
 *       description="The Field address"
 *   ),
 *   @OA\Property(
 *       property="organization_id",
 *       type="number",
 *       required={"true"},
 *       example=1,
 *       description="The Field organization_id"
 *   ),
 *   @OA\Property(
 *       property="field_supervisor_id",
 *       type="number",
 *       required={"true"},
 *       example=1,
 *       description="The Field field_supervisor_id"
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
class Field extends Base
{
    /**
     * Get the organization that owns the Field
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
    /**
     * Get the fieldSupervisor that owns the Field
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fieldSupervisor()
    {
        return $this->belongsTo(FieldSupervisor::class);
    }

    /**
     * Relationship ticket
     * A field has many tickect
     * 
     * Get the tickets associated to field that owns the attributes.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     * 
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

}
