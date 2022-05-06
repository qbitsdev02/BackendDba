<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ClientState extends Pivot
{
    protected $fillable = ['client_id', 'state_id'];
}
