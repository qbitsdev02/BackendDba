<?php

namespace Database\Seeders;

use App\Models\Coin;
use App\Models\Concept;
use App\Models\Entity;
use App\Models\OperationType;
use App\Models\PaymentOrder;
use App\Models\User;
use Illuminate\Database\Seeder;

class PaymentOrderSeeder extends Seeder
{
    protected $polimorph = [
        'App\\Models\\Provider',
        'App\\Models\\Field',
        'App\\Models\\Personal',
        'App\\Models\\BranchOffice'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonFile = file_get_contents(app_path('Data/master.json'));
        $dataMaster = json_decode($jsonFile);
        foreach($dataMaster as $data) {
            $beneficiary = $this->findMorph('name',  $data->Beneficiario);
            if ($beneficiary) {
                $paymentOrder = new PaymentOrder();
                $paymentOrder->organization_id = 1;
                $paymentOrder->country_id = 1;
                $paymentOrder->status = 'approved';
                $paymentOrder->user_created_id = $this->findModel(User::class, 'name',  $data->Cargado_Por)['id'];
                $paymentOrder->concept_id = $this->findModel(Concept::class, 'name',  $data->Concepto)['id'];
                $paymentOrder->operation_type_id = $this->findModel(OperationType::class, 'name',  $data->Tipo_Operacion)['id'];
                $paymentOrder->entity_id = $this->findModel(Entity::class, 'name',  $data->Entidad)['id'];
                $paymentOrder->coin_id = $this->findModel(Coin::class, 'name',  $data->Moneda)['id'];
                $paymentOrder->ownerable_type = $beneficiary['model'];
                $paymentOrder->ownerable_id = $beneficiary['data']['id'];
                $paymentOrder->amount = $data->Cantidad;
                $paymentOrder->description = $data->Memoria;

                $paymentOrder->save();
            }
        }
    }

    private function findModel($model, String $field, String $value)
    {
        return $model::where($field, $value)->first();
    }

    private function findMorph(String $field, String $value)
    {
        foreach ($this->polimorph as $key => $morph) {
            $find = $morph::where($field, $value)->first();
            if ($find) {
                return [
                    'data' => $find,
                    'model' => $morph
                ];
            }
        }
    }
}
