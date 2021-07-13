<?php

namespace Jetimob\PortoSeguro\Entity;

use Jetimob\PortoSeguro\Exceptions\InvalidArgumentException;

/**
 *Dados complementares do imóvel objeto do contrato de locação
 */
class PropostaLocalRisco
{
    protected string $tipoLogradouro;

    protected string $logradouro;

    protected string $numero;

    protected ?string $complemento;

    protected string $bairro;

    protected string $municipio;

    protected string $estado;

    /**
     * @return string
     */
    public function getTipoLogradouro(): string
    {
        return $this->tipoLogradouro;
    }

    /**
     * Tipo logradouro do local de risco da proposta de seguros. Composto por até 3 letras.
     * Campo obrigatório e conforme lista abaixo:
     * A - AREA
     * AER - AEROPORTO
     * AL - ALAMEDA
     * AV - AVENIDA
     * CH - CHACARA
     * CJ - CONJUNTO
     * COL - COLONIA
     * CON - CONDOMINIO
     * CPO - CAMPO
     * DT - DISTRITO
     * ESP - ESPLANADA
     * EST - ESTRADA
     * ETC - ESTACAO
     * FAV - FAVELA
     * FAZ - FAZENDA
     * FRA - FEIRA
     * JD - JARDIM
     * LD - LADEIRA
     * LG - LAGO
     * LGA - LAGOA
     * LOT - LOTEAMENTO
     * LRG - LARGO
     * MRO - MORRO
     * NUC - NUCLEO
     * O - OUTROS
     * PAT - PATIO
     * PC - PRACA
     * PRQ - PARQUE
     * PSA - PASSARELA
     * Q - QUADRA
     * R - RUA
     * REC - RECANTO
     * RES - RESIDENCIAL
     * ROD - RODOVIA
     * SIT - SITIO
     * ST - SETOR
     * TR - TRECHO
     * TRV - TREVO
     * TV - TRAVESSA
     * V - VIA
     * VD - VIADUTO
     * VER - VEREDA
     * VL - VILA
     * VLA - VIELA
     * VLE - VALE
     *
     * @required
     * @param string $tipoLogradouro
     * @return PropostaLocalRisco
     */
    public function setTipoLogradouro(string $tipoLogradouro): PropostaLocalRisco
    {
        $this->tipoLogradouro = $tipoLogradouro;
        return $this;
    }

    /**
     * @return string
     */
    public function getLogradouro(): string
    {
        return $this->logradouro;
    }

    /**
     * Nome do logradouro do local de risco da proposta de seguro. É composto por até 40 caracteres.
     *
     * @example TIRADENTES
     * @required
     *
     * @param string $logradouro
     * @return PropostaLocalRisco
     */
    public function setLogradouro(string $logradouro): PropostaLocalRisco
    {
        if (strlen($logradouro) > 40) {
            throw new InvalidArgumentException('O logradouro pode possuir no máximo 40 caracteres');
        }

        $this->logradouro = $logradouro;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumero(): string
    {
        return $this->numero;
    }

    /**
     * Número do endereço do local de risco da proposta de seguro.
     * É composto por até 6 caracteres. Caso o endereço não possua número, informar SN.
     *
     * @required
     *
     * @param string $numero
     * @return PropostaLocalRisco
     */
    public function setNumero(string $numero = 'SN'): PropostaLocalRisco
    {
        if (strlen($numero) > 6) {
            throw new InvalidArgumentException('O numero pode possuir no máximo 6 caracteres');
        }

        $this->numero = $numero;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getComplemento(): ?string
    {
        return $this->complemento;
    }

    /**
     * Complemento do local de risco da proposta de seguro. É composto por até 20 caracteres. Campo opcional.
     * @param string|null $complemento
     * @return PropostaLocalRisco
     */
    public function setComplemento(?string $complemento): PropostaLocalRisco
    {
        if (strlen($complemento) > 20) {
            throw new InvalidArgumentException('O campo complemento pode possuir no máximo 20 caracteres');
        }

        $this->complemento = $complemento;
        return $this;
    }

    /**
     * @return string
     */
    public function getBairro(): string
    {
        return $this->bairro;
    }

    /**
     * Bairro do local de risco da proposta de seguro. É composto por até 40 caracteres. Campo obrigatório.
     *
     * @required
     * @example Vila Assunção
     *
     * @param string $bairro
     * @return PropostaLocalRisco
     */
    public function setBairro(string $bairro): PropostaLocalRisco
    {
        if (strlen($bairro) > 40) {
            throw new InvalidArgumentException('O campo bairro pode possuir no máximo 40 caracteres');
        }

        $this->bairro = $bairro;
        return $this;
    }

    /**
     * @return string
     */
    public function getMunicipio(): string
    {
        return $this->municipio;
    }

    /**
     * Cidade do local de risco da proposta de seguro. É composto por até 30 caracteres. Campo obrigatório.
     * @param string $municipio
     * @return PropostaLocalRisco
     */
    public function setMunicipio(string $municipio): PropostaLocalRisco
    {
        if (strlen($municipio) > 30) {
            throw new InvalidArgumentException('O campo municipio pode possuir no máximo 30 caracteres');
        }
        $this->municipio = $municipio;
        return $this;
    }

    /**
     * @return string
     */
    public function getEstado(): string
    {
        return $this->estado;
    }

    /**
     * Sigla do estado do local de risco da proposta de seguro. É composto por 2 letras maiúsculas.
     *
     * @required
     * @example SC
     *
     * @param string $estado
     * @return PropostaLocalRisco
     */
    public function setEstado(string $estado): PropostaLocalRisco
    {
        if (strlen($estado) !== 2) {
            throw new InvalidArgumentException('A sigla do estado contém 2 caracteres');
        }

        $estado = strtoupper($estado);

        $this->estado = $estado;
        return $this;
    }


}
