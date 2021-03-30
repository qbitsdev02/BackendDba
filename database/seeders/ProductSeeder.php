<?php

namespace Database\Seeders;

use App\Models\AttributeType;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonFile = file_get_contents(app_path('Data/newDada.json'));
        $products = json_decode($jsonFile);
        foreach ($products as $product => $value) {
            $productModel = new Product();
            $productModel->name = "{$value->codpro} {$value->marveh} {$value->ma01coda}";
            $productModel->code = $value->codpro;
            $productModel->description = "{$value->codpro} {$value->marveh} {$value->ma01coda}";
            $productModel->category_id = Category::where('name', Str::of($value->tipveh)->trim()->upper())->first()->id ?? null;
            $productModel->brand_id = Brand::where('name', Str::of($value->marveh)->trim()->upper())->first()->id ?? null;
            $productModel->user_created_id = 1;
            $productModel->save();

            collect($value->attributte_types)
                ->each(function ($key, $value) use( $productModel) {
                    $attributeType = AttributeType::where("name", Str::of($key->name)->trim()->upper())->first();
                    $productModel
                        ->attributeTypes()
                        ->attach(
                            $attributeType->id,
                            [
                                'description' => Str::of($key->value)->trim(),
                                'user_created_id' => $productModel->user_created_id
                            ]
                        );
                });
        }
    }
}
