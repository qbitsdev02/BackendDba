<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonFile = file_get_contents('app/Data/Categories.json');
        $categories = json_decode($jsonFile);
        foreach($categories as $category)
        {
            $categoryModel = new Category();
            $categoryModel->name = Str::of($category->TIPVEH)->trim();
            $categoryModel->description = Str::of($category->TIPVEH)->trim();
            $categoryModel->user_created_id = 1;
            $categoryModel->save();
        }
    }
}
