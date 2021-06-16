<?php

namespace App\Models;

class BudgetRequest extends Base
{
    /**
     * @OA\Schema(
     *   schema="BudgetRequest",
     *   type="object",
     *  @OA\Property(property="user_created_id", type="number"),
     *  @OA\Property(property="user_updated_id", type="number"),
     *  @OA\Property(
     *       property="budgetRequestDetails",
     *       type="array",
     *       required={"true"},
     *       @OA\Items(
     *           @OA\Property(property="provider_id", type="number"),
     *           @OA\Property(property="email", type="string"),
     *           @OA\Property(property="user_created_id", type="number")
     *       ),
     *       description="The Budget Request provider"
     *   ),
     *  @OA\Property(
     *       property="providers",
     *       type="array",
     *       required={"true"},
     *       @OA\Items(
     *           @OA\Property(property="product_id", type="number"),
     *           @OA\Property(property="amount", type="number"),
     *           @OA\Property(property="user_created_id", type="number")
     *       ),
     *       description="The Budget Request details"
     *   )
     * )
     */
    /**
     * Get all of the budgetRequestDetails for the BudgetRequest
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function budgetRequestDetails()
    {
        return $this->hasMany(BudgetRequestDetail::class);
    }

    /**
     * The budgetRequestProvider that belong to the BudgetRequest
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function budgetRequestProvider()
    {
        return $this->belongsToMany(BudgetRequestProvider::class, 'budget_request_provider', 'budget_request_id', 'provider_id');
    }
}
