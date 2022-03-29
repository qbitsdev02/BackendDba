<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdateEgressTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        \Log::info(request());
        return [
            'name' => [
                'required',
                Rule::unique('egress_types')
                    // ->ignore($this->id)
                    ->whereNull('deleted_at'),
            ]
        ];
    }
}
