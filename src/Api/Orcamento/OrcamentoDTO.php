<?php

namespace Jetimob\PortoSeguro\Api\Orcamento;

use Jetimob\Http\Traits\Serializable;
use Jetimob\PortoSeguro\Entity\Contrato;
use Jetimob\PortoSeguro\Entity\OrcamentoCobertura;
use Jetimob\PortoSeguro\Entity\OrcamentoLocatario;
use Jetimob\PortoSeguro\Entity\PropostaLocalRisco;

class OrcamentoDTO implements \JsonSerializable
{
    use Serializable;

    protected string $susep;

    protected ?string $orcamentoExterno;

    protected ?string $cpfCotador;

    protected ?string $imobiliaria;

    protected string $cep;

    protected array $locatarios;

    protected array $coberturas;

    protected Contrato $contrato;

    protected PropostaLocalRisco $localRisco;

    protected function locatariosItemType(): string
    {
        return OrcamentoLocatario::class;
    }

    protected function coberturasItemType(): string
    {
        return OrcamentoCobertura::class;
    }

    /**
     * @param string $susep
     *
     * @return OrcamentoDTO
     */
    public function setSusep(string $susep): OrcamentoDTO
    {
        $this->susep = $susep;
        return $this;
    }

    /**
     * @param string|null $orcamentoExterno
     *
     * @return OrcamentoDTO
     */
    public function setOrcamentoExterno(?string $orcamentoExterno): OrcamentoDTO
    {
        $this->orcamentoExterno = $orcamentoExterno;
        return $this;
    }

    /**
     * @param string|null $cpfCotador
     *
     * @return OrcamentoDTO
     */
    public function setCpfCotador(?string $cpfCotador): OrcamentoDTO
    {
        $this->cpfCotador = $cpfCotador;
        return $this;
    }

    /**
     * @param string|null $imobiliaria
     *
     * @return OrcamentoDTO
     */
    public function setImobiliaria(?string $imobiliaria): OrcamentoDTO
    {
        $this->imobiliaria = $imobiliaria;
        return $this;
    }

    /**
     * @param string $cep
     *
     * @return OrcamentoDTO
     */
    public function setCep(string $cep): OrcamentoDTO
    {
        $this->cep = $cep;
        return $this;
    }

    /**
     * @param array $locatarios
     *
     * @return OrcamentoDTO
     */
    public function setLocatarios(array $locatarios): OrcamentoDTO
    {
        $this->locatarios = $locatarios;
        return $this;
    }

    /**
     * @param array $coberturas
     *
     * @return OrcamentoDTO
     */
    public function setCoberturas(array $coberturas): OrcamentoDTO
    {
        $this->coberturas = $coberturas;
        return $this;
    }

    /**
     * @param Contrato $contrato
     *
     * @return OrcamentoDTO
     */
    public function setContrato(Contrato $contrato): OrcamentoDTO
    {
        $this->contrato = $contrato;
        return $this;
    }

    /**
     * @return PropostaLocalRisco
     */
    public function getLocalRisco(): PropostaLocalRisco
    {
        return $this->localRisco;
    }

    /**
     * @param PropostaLocalRisco $localRisco
     *
     * @return OrcamentoDTO
     */
    public function setLocalRisco(PropostaLocalRisco $localRisco): OrcamentoDTO
    {
        $this->localRisco = $localRisco;
        return $this;
    }
}
