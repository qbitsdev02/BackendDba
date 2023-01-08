<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @OA\Schema(
 *   schema="Active",
 *   type="object",
 *   @OA\Property(
 *       property="name",
 *       type="string",
 *       required={"true"},
 *       description="The name active"
 *   ),
 *   @OA\Property(
 *       property="status",
 *       type="string",
 *       required={"true"},
 *       default="active",
 *       description="The status active"
 *   ),
 *   @OA\Property(
 *       property="description",
 *       type="string",
 *       required={"true"},
 *       description="description active"
 *   ),
 *    @OA\Property(
 *       property="ownerable_type",
 *       type="string",
 *       required={"true"},
 *       example="App\Models\NameModel",
 *       description="The active ownerable_type"
 *   ),
 *   @OA\Property(
 *       property="ownerable_id",
 *       type="number",
 *       required={"true"},
 *       example=1,
 *       description="The active ownerable_id"
 *   ),
 *  @OA\Property(
 *       property="attributes",
 *       type="array",
 *       required={"false"},
 *       @OA\Items(
 *           @OA\Property(property="attribute_id", type="number"),
 *           @OA\Property(property="valor", type="string"),
 *           @OA\Property(property="user_created_id", type="number", example=1)
 *       ),
 *       description="The active attribute_types"
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
class Active extends Base
{
    use HasFactory;

    /**
     * Relationship ticket
     * A active has many ticket associated
     *
     * Get the ticket associated to the active
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }


    /**
     * Relationship ActivepersonalTicket
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function activePersonalTickets()
    {
        return $this->hasMany(ActivePersonalTicket::class);
    }

    /**
     * Relationship attribute
     */
    public function attributes()
    {
        return $this->belongsToMany(Attribute::class)
            ->withPivot('valor');
    }

    /**
     *
     */
    public function ownerable()
    {
        return $this->morphTo();
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
