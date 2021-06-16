<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class BudgetRequestProvider extends Pivot
{
    protected $fillable = [
        'provider_id',
        'budget_request_id',
        'user_created_id',
        'user_updated_id',
        'email'
    ];
}
