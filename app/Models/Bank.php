<?php

namespace App\Models;

class Bank extends Base
{
    protected $fillable = [
        'institution_id',
        'name',
        'link_session_id',
        'public_token',
        'status',
        'transfer_status',
        'accounts',
        'user_created_id',
        'user_updated_id'
    ];
}
