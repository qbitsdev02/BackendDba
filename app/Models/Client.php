<?php

namespace App\Models;

class Client extends Base
{
    protected $appends = ['full_name'];

    public function getFullNameAttribute()
    {
        return "{$this->document_number}-{$this->name}";
    }
    /**
     * The states that belong to the MaterialSupplier
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function states()
    {
        return $this->belongsToMany(State::class)
          ->using(ClientState::class);
    }
}
