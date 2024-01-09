<?php

use App\Http\Controllers\Api\Company\CategoryController;
use App\Http\Controllers\Api\Company\CompanyController;
use App\Http\Controllers\Api\Payment\PaymentController;
use Illuminate\Support\Facades\Route;

Route::apiResource('categories',CategoryController::class);

Route::apiResource('companies',CompanyController::class);

Route::apiResource('payment',PaymentController::class);


