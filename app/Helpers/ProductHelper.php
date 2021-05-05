<?php
namespace App\Helpers;

use App\Models\BillElectronicDetail;
use App\Models\Product;
use App\Models\Warehouse;

class ProductHelper
{
    public static function getStock(Product $product)
    {
        return $product->warehouses()
            ->distinct()
            ->get()
            ->map(function(Warehouse $warehouse) use ($product) {
                $product_sale = self::billProduct($product, $warehouse);
                $warehouseProductEntry = self::inventory($product, 'entry');
                $warehouseProductExit = self::inventory($product, 'exit');

                return [
                    'warehouse_id' => $warehouse->id,
                    'warehouse_name' => "{$warehouse->description} - {$warehouse->branchOffice->name}",
                    'purchase_price' => $warehouse->purchaseDetails->last()->purchase_price,
                    'sale_price' => $warehouse->purchaseDetails->last()->sale_price,
                    'stock_product' => ($warehouse->purchaseDetails->sum('amount') + $warehouseProductEntry) - ($product_sale + $warehouseProductExit)
                ];
            });
    }

    private static function inventory(Product $product, $movement_type)
    {
        return $product->inventories
            ->sum(function ($inventory) use($movement_type) {
                if ($inventory->movement_type === $movement_type) {
                    return $inventory->amount;
                }
            });
    }

    private static function billProduct(Product $product, Warehouse $warehouse)
    {
        return $product->billElectronicDetails
            ->sum(function (BillElectronicDetail $billElectronicDetail) use($warehouse) {
                if ($billElectronicDetail->bill->branch_office_id === $warehouse->branch_office_id) {
                    return $billElectronicDetail->amount;
                }
            });
    }
}
