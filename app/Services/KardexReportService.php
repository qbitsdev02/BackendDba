<?php
namespace App\Services;

use App\Models\Product;

class KardexReportService
{
    public function saveKardexReport($model)
    {
        $product = Product::find($model->product_id);
        $model->kardexReports()
            ->create([
                'stock' => $product->stock,
                'product_id' => $model->product_id,
                'user_created_id' => $model->user_created_id
            ]);

        return $this;
    }
}
