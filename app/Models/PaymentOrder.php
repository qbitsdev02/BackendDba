<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentOrder extends Model
{
    protected $fillable = [
        'operation_type_id',
        'reference',
        'entity_id',
        'coin_id',
        'amount',
        'user_created_id',
        'user_updated_id'
    ];
}
