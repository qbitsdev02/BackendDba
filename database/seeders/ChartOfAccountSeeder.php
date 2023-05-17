<?php

namespace Database\Seeders;

use App\Models\ChartOfAccount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChartOfAccountSeeder extends Seeder
{
        /**
     * Recursive function to create concepts with their children.
     *
     * @param  array  $concepts
     * @param  int|null  $parentConceptId
     * @param  string|null  $parentCode
     * @return void
     */
    private function createConcepts(array $concepts, ?int $parentConceptId, ?string $parentCode = null)
    {
        foreach ($concepts as $index => $conceptData) {
            $code = $parentCode ? $parentCode . '.' . ($index + 1) : ($index + 1);

            $concept = new ChartOfAccount();
            $concept->name = $conceptData['name'];
            $concept->concept_id = $parentConceptId;
            $concept->code = $code;
            $concept->save();

            if (isset($conceptData['children']) && is_array($conceptData['children'])) {
                $this->createConcepts($conceptData['children'], $concept->id, $code);
            }
        }
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonFile = file_get_contents(app_path('Data/tree.json'));
        $conceptType = json_decode($jsonFile);

        // $conceptType = collect($conceptType)
        //     ->where('TipodePartida', null)
        //     ->where('Concepto', null);

        $conceptType = collect($conceptType)->keyBy('');

        foreach($conceptType as $egressType)
        {


            // $this->save($egressType->TipodePartida, $egressType->Code);

            // if (isset($egressType->Concepto) && $egressType->Concepto) {
            //     $this->save($egressType->Concepto, $egressType->Code, $egressType->TipodePartida);
            // }

            if (isset($egressType->TipodePartida) && $egressType->TipodePartida) {
                $this->save($egressType->TipodePartida, $egressType->Code, $egressType->Partida);
            }
        }
    }

    static function save($name, $code, $findName = null) {
        $chartOfAccountFind = ChartOfAccount::where('name', $name)->first();
        $chartOfAccountId = ChartOfAccount::where('name', $findName)->first();

        if (!$chartOfAccountFind) {
            $chartOfAccount = new ChartOfAccount();
            $chartOfAccount->name = $name;
            $chartOfAccount->code = $code;
            $chartOfAccount->chart_of_account_id = $chartOfAccountId ? $chartOfAccountId->id : null;
            $chartOfAccount->user_created_id = 1;
            $chartOfAccount->save();
        }
    }
}
