<?php

namespace App\Observers;

use App\Models\FieldCashFlow;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class FieldCashFlowObserver
{
    /**
     * Handle the FieldCashFlow "created" event.
     *
     * @param  \App\Models\FieldCashFlow  $fieldCashFlow
     * @return void
     */
    public function created(FieldCashFlow $fieldCashFlow)
    {
        if(request()->has('files')) {
            $files = request()->file('files');
            for($i = 0; $i < count($files); $i++) {
                $file = $files[$i];
                $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();
                Storage::disk('dropbox')->putFileAs('field_cash_flow', $file, $filename);
                $fieldCashFlow->images()->create([
                    'img' => "field_cash_flow/{$filename}",
                    'user_created_id' => $fieldCashFlow->user_created_id
                ]);
            }
        }
    }

    /**
     * Handle the FieldCashFlow "updated" event.
     *
     * @param  \App\Models\FieldCashFlow  $fieldCashFlow
     * @return void
     */
    public function updated(FieldCashFlow $fieldCashFlow)
    {
        //
    }

    /**
     * Handle the FieldCashFlow "deleted" event.
     *
     * @param  \App\Models\FieldCashFlow  $fieldCashFlow
     * @return void
     */
    public function deleted(FieldCashFlow $fieldCashFlow)
    {
        //
    }

    /**
     * Handle the FieldCashFlow "restored" event.
     *
     * @param  \App\Models\FieldCashFlow  $fieldCashFlow
     * @return void
     */
    public function restored(FieldCashFlow $fieldCashFlow)
    {
        //
    }

    /**
     * Handle the FieldCashFlow "force deleted" event.
     *
     * @param  \App\Models\FieldCashFlow  $fieldCashFlow
     * @return void
     */
    public function forceDeleted(FieldCashFlow $fieldCashFlow)
    {
        //
    }
}
