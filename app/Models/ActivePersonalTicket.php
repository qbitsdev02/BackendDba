<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ActivePersonalTicket extends Pivot
{
    /**
     * Relationship active
     * 
     * Get all the active
     * @return @return \Illuminate\Database\Eloquent\Relations\hasMany 
     */
    public function active()
    {
        return $this->belongsTo(Active::class);
    }

    /**
     * Relationship personal
     * 
     * Get all the personals
     * @return @return \Illuminate\Database\Eloquent\Relations\hasMany 
     */
    public function personal()
    {
        return $this->belongsTo(Personal::class);
    }


    /**
     * Relationship ticket
     * 
     * Get all the ticket
     * @return @return \Illuminate\Database\Eloquent\Relations\hasMany 
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

}
