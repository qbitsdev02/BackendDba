<?php
namespace App\Helpers;

use App\Models\DeliveryNote;

class DeliveryNoteHelper
{
    public static function lastSerieNumber($number, $supplier)
    {
        $deliveryNote = DeliveryNote::where('material_supplier_id', $supplier)->orderBy('id', 'desc')->first();
        if ($deliveryNote) {
            return $deliveryNote->serie_number + 1;
        } else {
            return $number;
        }
    }
}
