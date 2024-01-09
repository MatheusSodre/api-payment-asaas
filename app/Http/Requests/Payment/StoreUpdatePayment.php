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
        $id = $this->category;
        return [
            'customer'    => 'required|min:3|max:255',
            'dueDate'     => 'required|min:3|max:255',
            'value'       => 'required|min:1|max:255',
            'billingType' => 'required|min:1|max:255',
        ];
    }
}
// {
//     "billingType":"CREDIT_CARD",
//     "discount":{
//        "value":10,
//        "dueDateLimitDays":0
//     },
//     "interest":{
//        "value":2
//     },
//     "fine":{
//        "value":1
//     },
//     "customer":"cus_000005842482",
//     "dueDate":"2024-01-10",
//     "value":100,
//     "description":"Pedido 056984",
//     "daysAfterDueDateToCancellationRegistration":1,
//     "externalReference":"056984",
//     "postalService":false
//  }