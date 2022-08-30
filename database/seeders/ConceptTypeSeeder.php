<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\ConceptType;
use Illuminate\Database\Seeder;

class ConceptTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonFile = file_get_contents(app_path('Data/concept_id.json'));
        $conceptType = json_decode($jsonFile);
        foreach($conceptType as $egressType)
        {
            if (isset($egressType->concept_type_id) && $egressType->concept_type_id)
            {
                ConceptType::updateOrCreate(
                    ['name' => $egressType->concept_type_id],
                    [
                        'name' => $egressType->concept_type_id,
                        'description' => $egressType->concept_type_id,
                        'category_id' => Category::where('name', $egressType->category_id)->first()->id,
                        'user_created_id' => 1,
                    ]
                );
            }
        }
    }
}
