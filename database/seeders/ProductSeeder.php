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
        $jsonFile = file_get_contents(app_path('Data/newDataExample.json'));
        $products = json_decode($jsonFile);
        foreach ($products as $product => $value) {
            $productModel = new Product();
            $productModel->name = $value->descripcion;
            $productModel->code = $value->CODPRO;
            $productModel->numsec = $value->NUMSEC;
            $productModel->supsec = $value->SUPSEC;
            $productModel->description = $value->descripcion;
            $productModel->category_id = Category::where('name', Str::of($value->TIPVEH)->trim()->upper())->first()->id ?? null;
            $productModel->brand_id = Brand::where('name', Str::of($value->MARVEH)->trim()->upper())->first()->id ?? null;
            $productModel->user_created_id = 1;
            $productModel->save();

            foreach ($value->attribute_types as $attribute_type => $valueAttribute_types) {
                collect($valueAttribute_types)
                    ->each(function($value, $key) use($productModel) {
                        $attributeType = AttributeType::where("name", Str::of($key)->trim()->upper())->first();
                        $productModel
                            ->attributeTypes()
                            ->attach(
                                $attributeType->id,
                                [
                                    'description' => Str::of($value)->trim(),
                                    'user_created_id' => $productModel->user_created_id
                                ]
                            );
                    });
            }
        }
    }
}
