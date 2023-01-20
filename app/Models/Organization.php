<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;

/**
 * @OA\Schema(
 *   schema="Organization",
 *   type="object",
 *   @OA\Property(
 *       property="name",
 *       type="string",
 *       required={"true"},
 *       description="The Organization name"
 *   ),
 *   @OA\Property(
 *       property="description",
 *       type="string",
 *       required={"true"},
 *       description="The Organization description"
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
class Organization extends Base
{
    protected $appends = ['full_name'];

    public function getFullNameAttribute()
    {
        return "{$this->name}";
    }
    public function getLogoAttribute($value)
    {
        return Storage::url($value);
    }
    public function getSignatureAttribute($value)
    {
        return Storage::url($value);
    }
    public function getSealAttribute($value)
    {
        return Storage::url($value);
    }

    /**
     * Get all of the services f Organization
     *
     * @return \Illuminate\Database\Eloquent\Servins\HasMany
     */
    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
