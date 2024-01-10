<?php

namespace App\Models\Payment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_payment',
        'id_customer',
        'externalReference',
        'billingType',
        'value',
        'netValue',
        'bankSlipUrl',
        'invoiceUrl',
        'status',
        'dueDate'
    ];
}
