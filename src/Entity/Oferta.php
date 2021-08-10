<?php

namespace Jetimob\PortoSeguro\Entity;

use Jetimob\Http\Traits\Serializable;

class Oferta
{
    use Serializable;

    protected ?string $seguro;

    protected ?string $nomeSeguro;

    protected ?Calculo $calculo;

    protected array $formasPagamento;

    protected array $coberturas;

    public function formasPagamentoItemType(): string
    {
        return FormaPagamento::class;
    }

    public function coberturasItemType(): string
    {
        return Cobertura::class;
    }

    /**
     * Código identificador da oferta de seguro.
     * Este código deverá ser informado na etapa de proposta para emissão da apólice conforme escolha do segurado.
     *
     * @example 0001
     *
     * @param string|null $seguro
     * @return Oferta
     */
    public function setSeguro(?string $seguro): Oferta
    {
        $this->seguro = $seguro;
        return $this;
    }

    /**
     * Nome do produto de seguro ofertado
     *
     * @example FIANCA ESSENCIAL 12
     *
     * @param string|null $nomeSeguro
     * @return Oferta
     */
    public function setNomeSeguro(?string $nomeSeguro): Oferta
    {
        $this->nomeSeguro = $nomeSeguro;
        return $this;
    }

    /**
     * Detalhes dos valores brutos calculados no orçamento de seguro.
     *
     * @param Calculo|null $calculo
     * @return Oferta
     */
    public function setCalculo(?Calculo $calculo): Oferta
    {
        $this->calculo = $calculo;
        return $this;
    }

    /**
     * @param array $formasPagamento
     * @return Oferta
     */
    public function setFormasPagamento(array $formasPagamento): Oferta
    {
        $this->formasPagamento = $formasPagamento;
        return $this;
    }

    /**
     *Detalhes das coberturas de seguro
     *
     * @param array $coberturas
     * @return Oferta
     */
    public function setCoberturas(array $coberturas): Oferta
    {
        $this->coberturas = $coberturas;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSeguro(): ?string
    {
        return $this->seguro;
    }

    /**
     * @return string|null
     */
    public function getNomeSeguro(): ?string
    {
        return $this->nomeSeguro;
    }

    /**
     * @return Calculo|null
     */
    public function getCalculo(): ?Calculo
    {
        return $this->calculo;
    }

    /**
     * @return array
     */
    public function getFormasPagamento(): array
    {
        return $this->formasPagamento;
    }

    /**
     * @return array
     */
    public function getCoberturas(): array
    {
        return $this->coberturas;
    }

}
