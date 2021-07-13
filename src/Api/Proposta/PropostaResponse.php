<?php

namespace Jetimob\PortoSeguro\Api\Proposta;

use Jetimob\PortoSeguro\Api\PortoSeguroResponse;

class PropostaResponse extends PortoSeguroResponse
{
    protected ?string $sucursal = null;

    protected ?string $ramo = null;

    protected ?string $apolice = null;

    protected ?string $endosso = null;

    protected ?string $dataEmissao = null;

    protected ?string $mensagem = null;
}
