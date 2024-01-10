<?php
namespace App\Services\ServicesExternal\Traits;
use Http;

/**
 *
 */
trait ConsumeExternalService
{
    public function request(
        string $method,
        string $endPoint,
        array  $formParams = [],
        array  $headers = [],
        array  $options = []
    ){
        return Http::withHeaders($headers)
                    ->withOptions($options)
                    ->$method($this->url . $endPoint, $formParams);
    }
}


?>
