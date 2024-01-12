<?php

namespace App\Http\Requests\Payment;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePayment extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'customer'    => 'required|min:3|max:255',
            'dueDate'     => 'required|min:3|max:255',
            'value'       => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'billingType' => 'required|min:1|max:255'
        ];
    }
}
