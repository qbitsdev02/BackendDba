<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * 
 * @OA\Schema(
 *   schema="Ticket",
 *   type="object",
 *   @OA\Property(
 *       property="provider_id",
 *       type="number",
 *       required={"true"},
 *       description="The ticket provider_id"
 *   ),
 *   @OA\Property(
 *       property="field_id",
 *       type="number",
 *       required={"true"},
 *       description="The ticket field_id"
 *   ),
 *   @OA\Property(
 *       property="guide_id",
 *       type="number",
 *       required={"true"},
 *       description="The ticket guide_id"
 *   ),
 *   @OA\Property(
 *       property="tare_weight",
 *       type="number",
 *       required={"true"},
 *       description="The ticket tare weight"
 *   ),
 *   @OA\Property(
 *       property="gross_weight",
 *       type="number",
 *       required={"true"},
 *       description="The ticket gross_weight"
 *   ),
 *   @OA\Property(
 *       property="tare",
 *       type="number",
 *       required={"true"},
 *       description="The ticket tare"
 *   ),
 *   @OA\Property(
 *       property="vehicle_number",
 *       type="string",
 *       required={"true"},
 *       description="The ticket vehicle_number"
 *   ),
 *   @OA\Property(
 *       property="certificate",
 *       type="string",
 *       required={"true"},
 *       description="The ticket certificate"
 *   ),
 *   @OA\Property(
 *       property="start_date",
 *       type="string",
 *       required={"true"},
 *       description="The ticket start_date"
 *   ),
 *   @OA\Property(
 *       property="final_date",
 *       type="string",
 *       required={"true"},
 *       description="The ticket final_date"
 *   ),
 *   @OA\Property(
 *       property="checkweighing",
 *       type="string",
 *       required={"true"},
 *       description="The ticket checkweighing"
 *      
 *   ), 
 *   @OA\Property(
 *       property="client_id",
 *       type="number",
 *       required={"true"},
 *       description="The ticket client_id"
 * 
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
class Ticket extends Base
{
    use HasFactory;

    /**
     * Relationship Provider.
     * A ticket only has one provider.
     * 
     * Get the provider that owns the attributes
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     */
    public function provider(){
        
        return $this->belongsTo(Provider::class);

    }

    /**
     * Relationship field
     * A ticket only has one field.
     * 
     * Get the field associated to the ticket that owns attributes
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * 
     */
    public function field()
    {
        return $this->belongsTo(Field::class);
    }


    /**
     * Ralationship guide
     * A ticket only has one guide
     * 
     * Get the guide associated to the ticket that owns attributes
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function guide()
    {
        return $this->belongsTo(Guide::class);
    }


    /**
     * Relationship client 
     * A ticket only has client
     * 
     * Get the clints associated to the ticket.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
     
}
