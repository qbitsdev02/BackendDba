<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 *
 * @OA\Schema(
 *   schema="PaymentOrder",
 *   type="object",
 *   @OA\Property(
 *       property="description",
 *       type="string",
 *       required={"true"},
 *       description="The description to payment order"
 *   ),
 *   @OA\Property(
 *       property="status",
 *       type="string",
 *       required={"true"},
 *       default="pending_approval",
 *       description="The status active"
 *   ),
 *   @OA\Property(
 *       property="amount",
 *       type="number",
 *       required={"true"},
 *       description="The amount to payment order"
 *   ),
 *   @OA\Property(
 *       property="operation_type_id",
 *       type="number",
 *       required={"true"},
 *       description="The operation type to payment order"
 *   ),
 *   @OA\Property(
 *       property="ownerable_id",
 *       type="number",
 *       required={"true"},
 *       description="The ownerable_id to payment order"
 *   ),
 *  @OA\Property(
 *       property="ownerable_type",
 *       type="string",
 *       required={"true"},
 *      example = "App\Model\Name",
 *       description="The ownerable_type to payment order"
 *   ),
 *   @OA\Property(
 *       property="entity_id",
 *       type="number",
 *       required={"true"},
 *       description="The entity_id to payment order"
 *   ),
 *   @OA\Property(
 *       property="coin_id",
 *       type="number",
 *       required={"true"},
 *       description="The coin_id to payment order"
 *   ),
 *   @OA\Property(
 *       property="payment_date",
 *       type="string",
 *       required={"true"},
 *       description="The payment date to payment order"
 *   ),
 *   @OA\Property(
 *       property="user_created_id",
 *       type="number",
 *       required={"true"},
 *       description="The user_created_id to payment order"
 *   ),
 * )
 */
class PaymentOrder extends Base
{
    protected $fillable = [
        'operation_type_id',
        'description',
        'ticket_id',
        'entity_id',
        'coin_id',
        'payment_date',
        'amount',
        'user_created_id',
        'user_updated_id'
    ];


    /**
     * Relationship ticket
     * Get the ticket associated to the payment orden
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }


    /**
     * Relationship coin
     * Get the coin associated to the payment orden
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function coin()
    {
        return $this->belongsTo(Coin::class);
    }

    /**
     * Relationship entity
     * Get the entity associated to the payment orden
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function entity()
    {
        return $this->belongsTo(Entity::class);
    }

    /**
     * Relationship entity
     * Get the operation type associated to the payment orden
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function operationType()
    {
        return $this->belongsTo(OperationType::class);
    }

    /**
     *
     */
    public function ownerable()
    {
        return $this->morphTo();
    }

    /**
     * Relationship transaction
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    /**
     * Relationship transaction
     */
    public function concept()
    {
        return $this->belongsTo(Concept::class);
    }

    /**
     *
     */
    public function getPendingAttribute()
    {
        return $this->amount - $this->transactions->sum('amount');
    }

    /**
     * Get the concept that owns the PaymentOrder
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function concept()
    {
        return $this->belongsTo(Concept::class);
    }
}
