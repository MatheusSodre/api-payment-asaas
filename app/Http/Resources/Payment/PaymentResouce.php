<?php

namespace App\Http\Resources\Payment;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResouce extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        
        return [
            'cliente' => $this->id_customer,
            'url'     => $this->invoiceUrl,
            'urlBoleto' => $this->bankSlipUrl,
            'valor'   => $this->value,
            'status'  => $this->status,
            'metodo'  => $this->billingType,
            'dataVencimento' => $this->dueDate
        ];
    }
}
