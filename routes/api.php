<?php


use App\Http\Controllers\Api\Payment\PaymentController;
use Illuminate\Support\Facades\Route;



Route::apiResource('payment',PaymentController::class);


