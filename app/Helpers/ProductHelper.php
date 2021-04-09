<?php
namespace App\Helpers;

use App\Models\Product;
use App\Models\BranchOffice;

class ProductHelper
{
    public static function getStock(Product $product)
    {
        return $product->branchOffices()
            ->distinct()
            ->get()
            ->map(function(BranchOffice $branchOffice) use ($product) {
                
                $product_sale = $branchOffice
                    ->billElectronics
                    ->sum(function($row) use ($product) {
                        return $row->billElectronicDetails
                            ->where('product_id', $product->id)
                            ->sum('amount');
                    });
  
                return [
                    'branch_office_id' => $branchOffice->id,
                    'branch_office_name' => $branchOffice->name,
                    'stock_product' => $branchOffice->purchaseDetails->sum('amount') - $product_sale
                ];
            });
    }    
}
