<?php

namespace Database\Seeders;

use App\Models\Concept;
use App\Models\ConceptType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConceptSeeder extends Seeder
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
            if (isset($egressType->concept_id) && $egressType->concept_id)
            {
                $conceptTypeModel = new Concept();
                $conceptTypeModel->name = $egressType->concept_id;
                $conceptTypeModel->description = $egressType->concept_id;
                $conceptTypeModel->concept_id = ConceptType::where('name', $egressType->concept_type_id)->first()->id;
                $conceptTypeModel->user_created_id = 1;
                $conceptTypeModel->save();
            }
        }

    }
}
