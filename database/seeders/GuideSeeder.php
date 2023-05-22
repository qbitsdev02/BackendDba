<?php

namespace Database\Seeders;

use App\Models\Guide;
use App\Models\Organization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonFile = file_get_contents(app_path('Data/guias.json'));
        $dataMaster = json_decode($jsonFile);
        foreach($dataMaster as $data) {
            $guide = new Guide();
            $guide->created_at = $data['FECHA DE SOLICITUD'];
            $guide->material = $data['MATERIAL'];
            $guide->weight = $data['PESO'];
            $guide->origin_address = $data['ORIGEN'];
            $guide->destination_address = $data['DESTINO'];
            $guide->start_date = $data['FECHA INICIO'];
            $guide->deadline = $data['FECHA CIERRE'];
            $guide->organization_id = $this->getOrganization($data['CODIGO_RUNPA'])->id;
        }
    }

    public function getOrganization($code)
    {
        return Organization::where('code_runpa', $code)->first();
    }
}
