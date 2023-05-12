<?php

namespace App\Models;

class ChartOfAccount extends Base
{
    public function parent()
    {
        return $this->belongsTo(ChartOfAccount::class);
    }

    public function children()
    {
        return $this->hasMany(ChartOfAccount::class)
            ->with('children')
            ->orderBy('code', 'asc');
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
