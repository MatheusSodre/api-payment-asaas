<?php
namespace App\Services\ServicesExternal\PaymentMethods;
use App\Http\Resources\Payment\PaymentResouce;
use App\Services\ServicesExternal\Interface\PaymentInterface;
use App\Services\ServicesExternal\Traits\ConsumeExternalService;

class AsaasService implements PaymentInterface {

    use ConsumeExternalService;
    protected $url;
    protected $key;

    public function __construct()
    {
        $this->url = config('externalservice.available.asaas.url');
        $this->key = config('externalservice.available.asaas.key');
    }

    public function execute(array $params)
    {
       $response = $this->generatePayment($params);
       return $this->returnData($response);
    }

    public function generatePayment($params)
    {
        $headers = [
            "Accept"       => "application/json",
            "access_token" => $this->key,
            "content-type" => "application/json"
        ];
        $response = $this->request('post','/payments',$params,$headers);
        return $response;
    }

    public function returnData($params)
    {
        if($params->successful())
        {
            return [
                'mensagem' => 'Pagamento gerado com sucesso',
                'data'     => $this->data($params->json()),
                'status'   => $params->status()
            ];
        }
        return [
            'mensagem' => 'Erro gerar pagamento',
            'data'     => $params->json(),
            'status'   => $params->status()
        ];
    }

    public function data($params)
    {
        return [
            'id_payment' => $params['id'],
            'id_customer'=> $params['customer'],
            'externalReference' => $params['externalReference'],
            'billingType' => $params['billingType'],
            'value'       => $params['value'],
            'netValue'    => $params['netValue'],
            'bankSlipUrl' => isset($params['bankSlipUrl']) ? $params['bankSlipUrl']: null,
            'invoiceUrl'  => isset($params['invoiceUrl'])  ? $params['invoiceUrl'] : null,
            'status'  => $params['status'],
            'dueDate' => $params['dueDate']

        ];
    }

}
?>
