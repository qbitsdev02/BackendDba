<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
     * @OA\Schema(
     *   schema="Port",
     *   type="object",
     *   @OA\Property(
     *       property="name",
     *       type="string",
     *       required={"true"},
     *       description="The user name"
     *   ),
     *   @OA\Property(
     *       property="rif",
     *       type="string",
     *       required={"true"},
     *       description="The port rif"
     *   ),
     *   @OA\Property(
     *       property="city",
     *       type="string",
     *       required={"true"},
     *       description="The Provider city"
     *   ),
     *   @OA\Property(
     *       property="state",
     *       type="string",
     *       required={"true"},
     *       description="The Provider state"
     *   ),
     *   @OA\Property(
     *       property="user_created_id",
     *       type="number",
     *       required={"true"},
     *       example=1,
     *       description="The user create"
     *   ),
     *    @OA\Property(
     *       property="user_updated_id",
     *       type="number",
     *       required={"true"},
     *       example=1,
     *       description="The user update"
     *   ),
     * )
     */
class Port extends Base
{
    use HasFactory;


    /**
     * Relationship field
     * A port has many fields
     * 
     * Get the field associated to port that owns the attributes.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     * 
     */
    public function fields()
    {
        return $this->hasMany(Field::class);
    }



}
