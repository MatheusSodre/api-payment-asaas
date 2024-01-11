<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('id_payment');
            $table->string('id_customer');
            $table->string('externalReference')->nullable();
            $table->string('billingType');
            $table->integer('value');
            $table->integer('netValue');
            $table->string('bankSlipUrl')->nullable();
            $table->string('invoiceUrl')->nullable();
            $table->string('status');
            $table->string('dueDate');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
