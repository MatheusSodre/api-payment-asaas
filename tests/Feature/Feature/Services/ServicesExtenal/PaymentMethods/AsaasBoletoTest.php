<?php

namespace Tests\Feature\Feature\Services\ServicesExtenal\PaymentMethods;

use App\Services\ServicesExternal\PaymentMethods\AsaasService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AsaasBoletoTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_Assas_Boleto()
    {
        $service = new AsaasService();
        $pedido = rand(1000,500000);
        $payload = [];
        $payload['billingType'] = 'BOLETO';
        $payload['customer']    = 'cus_000005842482';
        $payload['dueDate']     = date('Y-m-d', strtotime("+". rand(1,3)."day"));;
        $payload['value']       = rand(100,500);
        $payload['description'] = "Pedido ".$pedido;
        $payload['externalReference'] = $pedido;

        $result = $service->execute($payload);
        $this->assertTrue(isset($result['status']));
        $this->assertTrue(isset($result['mensagem']));
        $this->assertTrue(isset($result['data']['id_payment']));
        $this->assertTrue(isset($result['data']['id_payment']));
        $this->assertTrue(isset($result['data']['bankSlipUrl']));

    }
}
