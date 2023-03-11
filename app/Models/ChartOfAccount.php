<?php

namespace App\Models;

class ChartOfAccount extends Base
{
    public static function boot()
    {
        parent::boot();

        static::creating(function ($chartOfAccount) {
            $parent = $chartOfAccount->parent;
            $max = $parent->children()->max('code') ?: $parent->code;
            $chartOfAccount->code = $max + 1;
        });
    }
    public function parent()
    {
        return $this->belongsTo(ChartOfAccount::class);
    }

    public function children()
    {
        return $this->hasMany(ChartOfAccount::class);
    }

    public function scopeRoots($query)
    {
        return $query->whereNull('chart_of_account_id');
    }

    public function scopeDescendantsAndSelf($query, $id)
    {
        return $query->where('id', $id)->with('children')->get()->flatMap(function ($item) {
            return $item->children->isEmpty() ? $item : [$item, $item->descendantsAndSelf($item->id)];
        });
    }
}
