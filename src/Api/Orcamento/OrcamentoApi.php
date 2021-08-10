<?php

namespace Jetimob\PortoSeguro\Api\Orcamento;

use GuzzleHttp\RequestOptions;
use Jetimob\PortoSeguro\Api\AbstractApi;

/**
 * Api com o endpoint para simular um orçamento de seguro
 * @link https://dev.portoseguro.com.br/api-portal/swagger/fiana-locatcia-aluguel-essencial/1.0.0#/Or%C3%A7amento_e_Emiss%C3%A3o/post_orcamentos
 */
class OrcamentoApi extends AbstractApi
{
    /**
     * Quando sucesso, retorna status 200 (HTTP Status Code) com todos os dados do orçamento, tais como:
     * ofertas, benefícios, formas e condições de pagamento no corpo da resposta
     */
    public function simular(OrcamentoDTO $jsonData): OrcamentoResponse
    {
        return $this->mappedPost('orcamentos', OrcamentoResponse::class, [
            RequestOptions::JSON => $jsonData->toArray()
        ]);
    }
}
