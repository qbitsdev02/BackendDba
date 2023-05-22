<?php

namespace App\Models;

class Role extends Base
{
    /**
     * @OA\Schema(
     *   schema="Role",
     *   type="object",
     *   @OA\Property(
     *       property="name",
     *       type="string",
     *       required={"true"},
     *       description="The Rolename"
     *   ),
     *   @OA\Property(
     *       property="acronym",
     *       type="string",
     *       required={"true"},
     *       description="The Role password"
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
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'acronym',
        'name',
        'user_created_id',
        'user_updated_id'
    ];

    public static $filterable = [];

    /**
     * The modules that belong to the Role
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function modules()
    {
        return $this->belongsToMany(Module::class)->withPivot('permissions');
    }
}
