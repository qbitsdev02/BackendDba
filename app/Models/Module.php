<?php

namespace App\Models;

class Module extends Base
{
    protected $casts = [
        'divices' => 'array',
    ];
    /**
     * The roles that belong to the Module
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Get the section that owns the Module
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
