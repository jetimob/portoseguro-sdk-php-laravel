<?php

namespace Jetimob\PortoSeguro\Api\Proposta;

use Jetimob\Http\Traits\Serializable;
use Jetimob\PortoSeguro\Entity\Cobranca;
use Jetimob\PortoSeguro\Entity\Locador;
use Jetimob\PortoSeguro\Entity\PropostaLocalRisco;
use Jetimob\PortoSeguro\Entity\PropostaLocatario;

class PropostaDTO implements \JsonSerializable
{
    use Serializable;

    protected string $orcamento;

    protected ?string $orcamentoExterno = null;

    protected string $emissao;

    protected string $seguro;

    protected Cobranca $cobranca;

    protected Locador $locador;

    protected PropostaLocalRisco $localRisco;

    protected array $locatarios;

    public function locatariosItemType(): string
    {
        return PropostaLocatario::class;
    }

    /**
     * @param string $orcamento
     *
     * @return PropostaDTO
     */
    public function setOrcamento(string $orcamento): PropostaDTO
    {
        $this->orcamento = $orcamento;
        return $this;
    }

    /**
     * @param string|null $orcamentoExterno
     *
     * @return PropostaDTO
     */
    public function setOrcamentoExterno(?string $orcamentoExterno): PropostaDTO
    {
        $this->orcamentoExterno = $orcamentoExterno;
        return $this;
    }

    /**
     * @param string $emissao
     *
     * @return PropostaDTO
     */
    public function setEmissao(string $emissao): PropostaDTO
    {
        $this->emissao = $emissao;
        return $this;
    }

    /**
     * @param string $seguro
     *
     * @return PropostaDTO
     */
    public function setSeguro(string $seguro): PropostaDTO
    {
        $this->seguro = $seguro;
        return $this;
    }

    /**
     * @param Cobranca $cobranca
     *
     * @return PropostaDTO
     */
    public function setCobranca(Cobranca $cobranca): PropostaDTO
    {
        $this->cobranca = $cobranca;
        return $this;
    }

    /**
     * @param Locador $locador
     *
     * @return PropostaDTO
     */
    public function setLocador(Locador $locador): PropostaDTO
    {
        $this->locador = $locador;
        return $this;
    }

    /**
     * @param PropostaLocalRisco $localRisco
     *
     * @return PropostaDTO
     */
    public function setLocalRisco(PropostaLocalRisco $localRisco): PropostaDTO
    {
        $this->localRisco = $localRisco;
        return $this;
    }

    /**
     * @param array $locatarios
     *
     * @return PropostaDTO
     */
    public function setLocatarios(array $locatarios): PropostaDTO
    {
        $this->locatarios = $locatarios;
        return $this;
    }
}
