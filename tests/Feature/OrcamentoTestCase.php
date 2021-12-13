<?php

namespace Jetimob\PortoSeguro\Tests\Feature;

use Jetimob\PortoSeguro\Api\Orcamento\OrcamentoApi;
use Jetimob\PortoSeguro\Api\Orcamento\OrcamentoDTO;
use Jetimob\PortoSeguro\Api\Orcamento\OrcamentoResponse;
use Jetimob\PortoSeguro\Entity\Cobertura;
use Jetimob\PortoSeguro\Entity\Contrato;
use Jetimob\PortoSeguro\Entity\OrcamentoLocatario;
use Jetimob\PortoSeguro\Entity\PropostaLocalRisco;
use Jetimob\PortoSeguro\Exceptions\PortoSeguroRequestException;
use Jetimob\PortoSeguro\Facades\PortoSeguro;
use Jetimob\PortoSeguro\Tests\TestCase;

class OrcamentoTestCase extends TestCase
{
    protected OrcamentoApi $api;

    public function setUp(): void
    {
        parent::setUp();
        $this->api = PortoSeguro::orcamento();
    }

    protected function getMinimumRequest(): OrcamentoDTO
    {
        $locatario = OrcamentoLocatario::new('S', '58874739672');
        $cobertura = Cobertura::new('001', 2007.00);

        $currentDay = date('d');
        $currentMonth = date('m');
        $currentYear = date('Y');
        $currentDate = PortoSeguro::dateToString($currentDay, $currentMonth, $currentYear);
        $futureDate = PortoSeguro::dateToString($currentDay, $currentMonth, (int) $currentYear + 2);

        $contrato = Contrato::new(Contrato::LOCACAO_EM_VIGOR,
            $currentDate,
            $futureDate,
            $currentDate,
            $futureDate,
        );

        return (new OrcamentoDTO())
            ->setSusep('TST01J')
            ->setCpfCotador('02033008231')
            ->setImobiliaria('000001')
            ->setCep('97015030')
            ->setLocalRisco((new PropostaLocalRisco())
                ->setTipoLogradouro('R')
                ->setLogradouro('Alameda Santos 1800')
                ->setNumero('14401')
                ->setBairro('Cerqueira César')
                ->setMunicipio('São Paulo')
                ->setEstado('SP')
                ->setPais('Brasil')
                ->setCodigoPais('01058')
                ->setCep('01418904')
            )
            ->setLocatarios([$locatario])
            ->setCoberturas([$cobertura])
            ->setContrato($contrato);
    }

    /** @test */
    public function shouldMakeAnOrcament()
    {
        try {
            $response = $this->api->simular($this->getMinimumRequest());
            $this->assertInstanceOf(OrcamentoResponse::class, $response);
            $this->assertSame(201, $response->getStatusCode());
            dump($response);
        } catch (PortoSeguroRequestException $exception) {
            dump($exception->getErrorMessage(), $exception->getError());
        }

    }
}
