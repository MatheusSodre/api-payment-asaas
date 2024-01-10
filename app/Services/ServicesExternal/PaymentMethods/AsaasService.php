<?php
namespace App\Services\ServicesExternal\PaymentMethods;
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

        return $response->json();
    }

    public function returnData($params)
    {
        return $params;
    }

}
?>
