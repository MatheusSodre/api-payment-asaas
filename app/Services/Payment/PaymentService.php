<?php

namespace App\Services\Payment;
use App\Http\Resources\Payment\PaymentResouce;
use App\Repositories\Payment\PaymentRepository;
use App\Services\ServicesExternal\PaymentMethods\AsaasService;

class PaymentService
{
    public function __construct(private AsaasService $asaasService,private PaymentRepository $paymentRepository)
    {
        $this->asaasService = $asaasService;
        $this->paymentRepository = $paymentRepository;
    }

    public function paginate($relations = [], $limit = null, $columns = ['*'])
    {
        return $this->paymentRepository->paginate($relations,$limit,$columns);
    }

    public function paymentAsaas($params)
    {
        $reponse = $this->asaasService->execute($params);
        if ($reponse['status'] == 200) 
        {
            $this->paymentRepository->create($reponse['data']);
            return $reponse;
        } 
       return $reponse;
    }
}

?>
