<?php

namespace Database\Seeders;

use App\Models\Concept;
use Illuminate\Database\Seeder;

class ConceptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonFile = file_get_contents('App\Data\TiposDeEgresosMaster.json');
        $conceptType = json_decode($jsonFile);
        foreach($conceptType as $egressType)
        {
            $conceptTypeModel = new Concept();
            $conceptTypeModel->name = $egressType->Name;
            $conceptTypeModel->description = $egressType->Name;
            $conceptTypeModel->concept_type_id = 2;
            $conceptTypeModel->user_created_id = 1;
            $conceptTypeModel->save();
        }
    }
}
