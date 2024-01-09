<?php

namespace App\Repositories\Payment;

use App\Models\Payment\Payment;
use App\Repositories\BaseRepository;

class PaymentRepository extends BaseRepository 
{
    public function __construct(Payment $payment)
    {
        $this->model = $payment;
    }
}
?>