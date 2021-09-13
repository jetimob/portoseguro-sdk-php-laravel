<?php

namespace Jetimob\PortoSeguro\Api\Proposta;

use Jetimob\PortoSeguro\Api\PortoSeguroResponse;

class PropostaResponse extends PortoSeguroResponse
{
    // Sucursal do corretor de seguros. É composto por até 2 caracteres numéricos.
    protected ?string $sucursal = null;
    // Código do ramo da apólice de seguros. É composto por 4 caracteres numéricos, preenchido com zeros à esquerda.
    protected ?string $ramo = null;
    // Número da apólice de seguros. É composto por 15 caracteres numéricos, preenchido com zeros à esquerda
    protected ?string $apolice = null;
    /**
     * Número do endosso da apólice de seguros. É composto por 4 caracteres numéricos, preenchido com zeros à esquerda.
     * Para apólices de seguro novo esse campo será 0000
     */
    protected ?string $endosso = null;
    // Data da emissão da apólice de seguros no formato DD/MM/AAAA
    protected ?string $dataEmissao = null;
    // Mensagem de confirmação da operação realizada.
    protected ?string $mensagem = null;

    /**
     * Sucursal do corretor de seguros. É composto por até 2 caracteres numéricos.
     * @example 1
     *
     * @return string|null
     */
    public function getSucursal(): ?string
    {
        return $this->sucursal;
    }

    /**
     * Código do ramo da apólice de seguros. É composto por 4 caracteres numéricos, preenchido com zeros à esquerda.
     * @example 0746
     *
     * @return string|null
     */
    public function getRamo(): ?string
    {
        return $this->ramo;
    }

    /**
     * Número da apólice de seguros. É composto por 15 caracteres numéricos, preenchido com zeros à esquerda
     * @example 000000000103659
     *
     * @return string|null
     */
    public function getApolice(): ?string
    {
        return $this->apolice;
    }

    /**
     * Número do endosso da apólice de seguros. É composto por 4 caracteres numéricos, preenchido com zeros à esquerda.
     * Para apólices de seguro novo esse campo será 0000
     * @example 0000
     *
     * @return string|null
     */
    public function getEndosso(): ?string
    {
        return $this->endosso;
    }

    /**
     * Data da emissão da apólice de seguros no formato DD/MM/AAAA
     * @example 11/06/2021
     *
     * @return string|null
     */
    public function getDataEmissao(): ?string
    {
        return $this->dataEmissao;
    }

    /**
     * Mensagem de confirmação da operação realizada.
     * @example APÓLICE DE SEGUROS EMITIDA
     *
     * @return string|null
     */
    public function getMensagem(): ?string
    {
        return $this->mensagem;
    }
}
