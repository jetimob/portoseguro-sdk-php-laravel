<?php

namespace Jetimob\PortoSeguro\Api\Proposta;

use GuzzleHttp\RequestOptions;
use Jetimob\PortoSeguro\Api\AbstractApi;

class PropostaApi extends AbstractApi
{
    public function submeter(PropostaDTO $jsonData): PropostaResponse
    {
        return $this->mappedPut('propostas', PropostaResponse::class, [
            RequestOptions::JSON => $jsonData->toArray()
        ]);
    }
}
