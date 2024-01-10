<?php

namespace App\Services\ServicesExternal\Interface;
interface PaymentInterface
{

    public function execute(array $params);
    public function generatePayment(array $params);
    public function returnData(array $params);

}
