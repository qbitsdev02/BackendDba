<?php
namespace App\Services;

use App\Models\Product;

class KardexReportService
{
    public function saveKardexReport($model)
    {
        $product = Product::find($model->product_id);
        $model->stock = collect($product->stock)->sum('stock_product');
        $model->update();
        return $this;
    }
}
