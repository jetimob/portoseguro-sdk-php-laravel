<?php

namespace Jetimob\PortoSeguro\Entity;

use Jetimob\Http\Traits\Serializable;

class Calculo
{
    use Serializable;

    protected ?float $adicionalFracionamento;

    protected ?float $taxaJuros;

    protected ?float $custoAploice;

    protected ?float $valorIS;

    protected ?float $valorLMG;

    protected ?float $taxaReativacao;

    /**
     * @return float|null
     */
    public function getAdicionalFracionamento(): ?float
    {
        return $this->adicionalFracionamento;
    }

    /**
     *
     * Valor dos juros calculado no orçamento (adicional de fracionamento).
     *
     * @param float|null $adicionalFracionamento
     * @return Calculo
     */
    public function setAdicionalFracionamento(?float $adicionalFracionamento): Calculo
    {
        $this->adicionalFracionamento = $adicionalFracionamento;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getTaxaJuros(): ?float
    {
        return $this->taxaJuros;
    }

    /**
     *
     * Percentual da taxa de juros utilizado no cálculo do orçamento.
     *
     * @param float|null $taxaJuros
     * @return Calculo
     */
    public function setTaxaJuros(?float $taxaJuros): Calculo
    {
        $this->taxaJuros = $taxaJuros;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getCustoAploice(): ?float
    {
        return $this->custoAploice;
    }

    /**
     *
     * Valor do custo de emissão da apólice de seguros calculado no orçamento.
     *
     * @param float|null $custoAploice
     * @return Calculo
     */
    public function setCustoAploice(?float $custoAploice): Calculo
    {
        $this->custoAploice = $custoAploice;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getValorIS(): ?float
    {
        return $this->valorIS;
    }

    /**
     *
     * Valor total da importância segurada calculada no orçamento.
     *
     * @param float|null $valorIS
     * @return Calculo
     */
    public function setValorIS(?float $valorIS): Calculo
    {
        $this->valorIS = $valorIS;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getValorLMG(): ?float
    {
        return $this->valorLMG;
    }

    /**
     *
     * Limite máximo de indenização para a apólice calculada no orçamento.
     *
     * @param float|null $valorLMG
     * @return Calculo
     */
    public function setValorLMG(?float $valorLMG): Calculo
    {
        $this->valorLMG = $valorLMG;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getTaxaReativacao(): ?float
    {
        return $this->taxaReativacao;
    }

    /**
     *
     * Taxa reativação da apólice calculada no orçamento
     *
     * @param float|null $taxaReativacao
     * @return Calculo
     */
    public function setTaxaReativacao(?float $taxaReativacao): Calculo
    {
        $this->taxaReativacao = $taxaReativacao;
        return $this;
    }

    public static function new(
        ?float $adicionalFracionamento,
        ?float $taxaJuros,
        ?float $custoAploice,
        ?float $valorIS,
        ?float $valorLMG,
        ?float $taxaReativacao
    ): self
    {
        return (new static())
            ->setAdicionalFracionamento($adicionalFracionamento)
            ->setTaxaJuros($taxaJuros)
            ->setCustoAploice($custoAploice)
            ->setValorIS($valorIS)
            ->setValorLMG($valorLMG)
            ->setTaxaReativacao($taxaReativacao);
    }
}
