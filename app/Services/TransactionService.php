<?php
namespace App\Services;

use App\Models\FieldCashFlow;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use App\Notifications\TransactionNotification;
use Illuminate\Http\Request;

class TransactionService
{
    protected $transaction;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    public function aditionalProcess(Request $request)
    {
        switch ($this->transaction->paymentOrder->ownerable_type) {
            case 'App\\Models\\Field':
                $this->saveFieldCashFlow();
                break;
            default:
                break;
        }
    }

    protected function saveFieldCashFlow()
    {
        $fieldCashFlow = new FieldCashFlow();
        $fieldCashFlow->amount = $this->transaction->amount;
        $fieldCashFlow->concept_id = $this->transaction->paymentOrder->concept_id;
        $fieldCashFlow->transaction_id = $this->transaction->id;
        $fieldCashFlow->status = 'pending_approval';
        $fieldCashFlow->description = $this->transaction->description;
        $fieldCashFlow->field_id = $this->transaction->paymentOrder->ownerable_id;
        $fieldCashFlow->beneficiary_id = $this->transaction->beneficiary_id;
        $fieldCashFlow->user_created_id = $this->transaction->user_created_id;
        $fieldCashFlow->save();
        $this->notify($fieldCashFlow->field->field_supervisor_id);
        return $this;
    }

    protected function notify($userId)
    {
        User::find($userId)
            ->notify(new TransactionNotification($this->transaction));
    }
}
