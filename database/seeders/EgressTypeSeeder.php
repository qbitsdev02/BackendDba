<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EgressType;

class EgressTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonFile = file_get_contents('App\Data\TiposDeEgresosMaster.json');
        $egressTypes = json_decode($jsonFile);
        foreach($egressTypes as $egressType)
        {
            $egressTypeModel = new EgressType();
            $egressTypeModel->name = $egressType->Name;
            $egressTypeModel->description = $egressType->Name;
            $egressTypeModel->user_created_id = 1;
            $egressTypeModel->save();
        }
    }
}
