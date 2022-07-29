<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @OA\Schema(
 *   schema="Personal",
 *   type="object",
 *   @OA\Property(
 *       property="name",
 *       type="string",
 *       required={"true"},
 *       description="The Entity name"
 *   ),
 *   @OA\Property(
 *       property="last_name",
 *       type="string",
 *       required={"true"},
 *       description="The last name personal"
 *   ),
 *   @OA\Property(
 *       property="document_number",
 *       type="string",
 *       required={"true"},
 *       description="The document number personal"
 *   ),
 *   @OA\Property(
 *       property="address",
 *       type="string",
 *       required={"true"},
 *       description="The address personal"
 *   ),
 *   @OA\Property(
 *       property="email",
 *       type="string",
 *       required={"true"},
 *       description="The email personal"
 *   ),
 *   @OA\Property(
 *       property="phone_number",
 *       type="string",
 *       required={"true"},
 *       description="The phone_number personal"
 *   ),
 *    @OA\Property(
 *       property="ownerable_type",
 *       type="string",
 *       required={"true"},
 *       example="App\Models\NameModel",
 *       description="The perosnal ownerable_type"
 *   ),
 *   @OA\Property(
 *       property="ownerable_id",
 *       type="number",
 *       required={"true"},
 *       description="The persoal ownerable_id"
 *   ),
 *   @OA\Property(
 *       property="staff_type_id",
 *       type="number",
 *       required={"true"},
 *       example=1,
 *       description="The staff type"
 *   ),
 *   @OA\Property(
 *       property="user_id",
 *       type="number",
 *       required={"true"},
 *       example=1,
 *       description="The user id"
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
class Personal extends Base
{
    use HasFactory;


    /**
     * Relationship ticket
     * A active has many ticket associated
     * 
     * Get the ticket associated to the personal 
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
        return $this->belongsTo(ActivePersonalTicket::class);
    }

    /**
     * Relationship to staff_type
     */
    public function staffType()
    {
        return $this->belongsTo(StaffType::class);
    }

    /**
     * Relationship to provider
     */
    public function provider()
    {
       return  $this->belongsTo(Provider::class);
    }

    /**
     * 
     */
    public function ownerable()
    {
        return $this->morphTo();
    }


}
