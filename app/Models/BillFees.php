<?php

namespace App\Models;

class BillFees extends Base
{
    protected $fillable = ['date', 'amount', 'user_created_id', 'user_updated_id'];
}
