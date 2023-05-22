<?php

namespace App\Models;

class CashFlow extends Base
{
    protected $fillable = [
        'date',
        'category',
        'concept_type',
        'concept',
        'beneficiary',
        'description',
        'provider',
        'guide_number',
        'weight',
        'control_number',
        'must',
        'to_have',
        'balance',
        'user_created_id',
        'user_updated_id'
    ];
}
