<?php

namespace App\Models;

class Expense extends Base
{
    /**
     * @OA\Schema(
     *   schema="Expense",
     *   type="object",
     *   @OA\Property(
     *       property="provider_id",
     *       type="number",
     *       required={"true"},
     *       description="The Expense provider_id"
     *   ),
     *   @OA\Property(
     *       property="seller_id",
     *       type="number",
     *       required={"true"},
     *       description="The Expense expense_reason_id"
     *   ),
     *   @OA\Property(
     *       property="coin_id",
     *       type="number",
     *       required={"true"},
     *       description="The Expense coin_id"
     *   ),
     *  @OA\Property(
     *       property="exchange_rate",
     *       type="string",
     *       required={"true"},
     *       description="The Expense exchange_rate"
     *   ),
     *  @OA\Property(
     *       property="expense_details",
     *       type="array",
     *       required={"true"},
     *       @OA\Items(
     *           @OA\Property(property="description", type="string"),
     *           @OA\Property(property="price", type="number"),
     *           @OA\Property(property="user_created_id", type="number")
     *       ),
     *       description="The Expense details"
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
     * Get the provider that owns the Expense
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
    /**
     * Get the expenseReason that owns the Expense
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function expenseReason()
    {
        return $this->belongsTo(ExpenseReason::class);
    }
    /**
     * Get the coin that owns the Expense
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function coin()
    {
        return $this->belongsTo(Coin::class);
    }
    /**
     * Get all of the expenseDetails for the Expense
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function expenseDetails()
    {
        return $this->hasMany(ExpenseDetail::class);
    }
}
