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
 *   ),
 *  @OA\Property(
 *       property="actives",
 *       type="array",
 *       required={"false"},
 *       @OA\Items(
 *           @OA\Property(property="personal_id", type="number"),
 *           @OA\Property(property="active_id", type="number"),
 *           @OA\Property(property="user_created_id", type="number")
 *       ),
 *       description="The Product attribute_types"
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

    protected $appends = ['net_weight'];
    /**
     * Relationship Provider.
     * A ticket only has one provider.
     *
     * Get the provider that owns the attributes
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     */
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function getNetWeightAttribute()
    {
        return $this->gross_weight - $this->tare_weight;
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

    /**
     * Relationship Active
     * A ticket only has associated to one personal
     *
     * Get the active associated to the ticket.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function actives()
    {
        return $this->belongsToMany(Active::class, 'active_personal_ticket');
    }

    /**
     * Relationship personal
     * A ticket only has associated to one personal
     *
     * Get the personal associated to the ticket
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function personals()
    {
        return $this->belongsToMany(Personal::class, 'active_personal_ticket');
    }

    /**
     * Relationship activePersonalTicket.
     */
    public function activePersonalTickes()
    {
        return $this->hasMany(ActivePersonalTicket::class);
    }

    /**
     * Relationship payment orden
     * Get the payment orden associated to the ticket
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function paymentOrders()
    {
        return $this->hasMany(PaymentOrder::class);
    }

}
