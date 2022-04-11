<?php

namespace App\Models;
/**
 * @OA\Schema(
 *   schema="BranchOffice",
 *   type="object",
 *   @OA\Property(
 *       property="name",
 *       type="string",
 *       required={"true"},
 *       description="The Branch Office name"
 *   ),
 *   @OA\Property(
 *       property="Description",
 *       type="string",
 *       required={"true"},
 *       description="The Branch Office Description"
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

class BranchOffice extends Base
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'user_created_id',
        'user_updated_id'
    ];

    public static $filterable = [];
    /**
     * Get all of the billElectronics for the BranchOffice
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function billElectronics()
    {
        return $this->hasMany(BillElectronic::class);
    }

    /**
     * Get all of the series for the BranchOffice
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function series()
    {
        return $this->hasMany(Serie::class);
    }
}
