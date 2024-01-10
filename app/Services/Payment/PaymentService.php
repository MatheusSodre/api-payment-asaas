<?php

namespace App\Services\Payment;
use App\Services\ServicesExternal\PaymentMethods\AsaasService;

class PaymentService
{
    public function __construct(private AsaasService $asaasService)
    {
        $this->asaasService = $asaasService;
    }

    public function paymentAsaas($params)
    {
       return $this->asaasService->execute($params);
    }
}

?>
