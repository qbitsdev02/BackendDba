<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpenseDetail extends Model
{
    protected $fillable = ['description', 'price', 'user_created_id', 'user_updated_id'];
}
