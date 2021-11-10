<?php

namespace Jetimob\PortoSeguro\Tests\Feature;

use Jetimob\PortoSeguro\Api\Proposta\PropostaApi;
use Jetimob\PortoSeguro\Api\Proposta\PropostaDTO;
use Jetimob\PortoSeguro\Api\Proposta\PropostaResponse;
use Jetimob\PortoSeguro\Entity\CartaoCredito;
use Jetimob\PortoSeguro\Entity\Cobranca;
use Jetimob\PortoSeguro\Entity\Endereco;
use Jetimob\PortoSeguro\Entity\Locador;
use Jetimob\PortoSeguro\Entity\Pep;
use Jetimob\PortoSeguro\Entity\PropostaLocalRisco;
use Jetimob\PortoSeguro\Entity\PropostaLocatario;
use Jetimob\PortoSeguro\Exceptions\PortoSeguroRequestException;
use Jetimob\PortoSeguro\Facades\PortoSeguro;
use Jetimob\PortoSeguro\Tests\TestCase;

class PropostaTestCase extends TestCase
{
    protected PropostaApi $api;

    public function setUp(): void
    {
        parent::setUp();
        $this->api = PortoSeguro::proposta();
    }

    /**
     * @see https://dev.portoseguro.com.br/api-portal/swagger/fiana-locatcia-aluguel-essencial/1.0.0#/Or%C3%A7amento_e_Emiss%C3%A3o/put_propostas
     * @return PropostaDTO
     */
    protected function getMinimumRequest(): PropostaDTO
    {
        $cartaoCredito = CartaoCredito::new(
            'vDDbFI+0gdU/XXPijFpY6pvc74QVw0dgU4LxYX2AkMs=',
            'Antonio da Silva',
            '40352092017',
            'tYNSkPmVlY6UPLih0AtBiw=='
        );
        $cobranca = Cobranca::new('FAT', '012');
        $endereco = (new Endereco())
            ->setCep('09781220')
            ->setTipoLogradouro('R')
            ->setLogradouro('SENADOR VERGUEIRO')
            ->setNumero('2323A')
            ->setComplemento('Bl 21 apto 42')
            ->setBairro('FERRAZÓPOLIS')
            ->setMunicipio('SAO BERNARDO DO CAMPO')
            ->setEstado('SP')
            ->setPais('Brasil')
            ->setCodigoPais('01058');
        $pep = Pep::new('001', '01058', '2323A', '001', '38543443415', 'Ulysses Guimarães');

        $locador = (new Locador())
            ->setCpfCnpj('03078001059')
            ->setNome('José da Silva')
            ->setDataNascimento(PortoSeguro::dateToString(10, 10, 1970))
            ->setMae('Maria da Silva')
            ->setEmail('locador.imovel@gmail.com')
            ->setTelefoneComercial('1141237758')
            ->setTelefoneCelular('11998467305')
            ->setTelefoneResidencial('1123993695')
            ->setEnderecoPrincipal($endereco)
            ->setEnderecoCobranca($endereco)
            ->setPep($pep);

        $locatario = (new PropostaLocatario())
            ->setCpfCnpj('20489072887')
            ->setTitular('S')
            ->setNome('João Antônio da Silva')
            ->setDataNascimento(PortoSeguro::dateToString(7, 2, 1947))
            ->setSexo('M')
            ->setMae('DEA TONELLI QUARANTA')
            ->setEmail('jose.antonio-01@gmail.com')
            ->setTelefoneCelular('11998467395')
            ->setTelefoneResidencial('1141231234')
            ->setTelefoneResidencial('1141239635')
            ->setPep($pep);

        return (new PropostaDTO())
            ->setSeguro('0001')
            ->setEmissao('S')
            ->setCobranca($cobranca)
            ->setLocador($locador)
            ->setLocatarios([$locatario])
            ->setLocalRisco((new PropostaLocalRisco())
                ->setTipoLogradouro('R')
                ->setLogradouro('Rua Appel')
                ->setNumero('347')
                ->setBairro('Nossa Sra. de Fátima')
                ->setMunicipio('Santa Maria')
                ->setEstado('RS')
                ->setPais('Brasil')
                ->setCodigoPais('01058')
                ->setCep('97015030')
            )
            ->setOrcamento('000000010340479');
    }

    /** @test */
    public function shouldMakeAnProposal()
    {
        try {
            $response = $this->api->submeter($this->getMinimumRequest());
            $this->assertInstanceOf(PropostaResponse::class, $response);
        } catch (PortoSeguroRequestException $exception) {
            dump($exception->getError(), $exception->getCode());
        }
    }
}
