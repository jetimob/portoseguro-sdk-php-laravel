<?php

namespace Jetimob\PortoSeguro\Entity;

class Cobertura extends OrcamentoCobertura
{
    /**
     * @var float
     * @example 1200.58
     * Limite máximo de indenização desta cobertura no seguro
     */
    protected float $valorLMI;

    /**
     * @var float
     * @example 30.98
     * Valor do prêmio desta cobertura
     */
    protected float $valorPremio;

    /**
     * Limite máximo de indenização desta cobertura no seguro
     *
     * @return float
     */
    public function getValorLMI(): float
    {
        return $this->valorLMI;
    }

    /**
     * @param mixed $valorLMI
     * @return Cobertura
     */
    public function setValorLMI($valorLMI)
    {
        $this->valorLMI = $valorLMI;
        return $this;
    }

    /**
     * Valor do prêmio desta cobertura
     *
     * @return float
     */
    public function getValorPremio(): float
    {
        return $this->valorPremio;
    }

    /**
     * @param mixed $valorPremio
     *
     * @return Cobertura
     */
    public function setValorPremio($valorPremio)
    {
        $this->valorPremio = $valorPremio;
        return $this;
    }
}
