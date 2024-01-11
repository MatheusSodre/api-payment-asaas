<?php

namespace App\Http\Controllers\Api\Payment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\StoreUpdatePayment;
use App\Http\Resources\Payment\PaymentResouce;
use App\Services\Payment\PaymentService;

class PaymentController extends Controller
{
    public function __construct(private PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function index()
    {
        return PaymentResouce::collection($this->paymentService->paginate());
    }

    public function Store(StoreUpdatePayment $request)
    {
        return $this->paymentService->paymentAsaas($request->validated());
    }
}
