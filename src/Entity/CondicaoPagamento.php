<?php

namespace Jetimob\PortoSeguro\Entity;

use Jetimob\Http\Traits\Serializable;
use Jetimob\PortoSeguro\Exceptions\InvalidArgumentException;
use Jetimob\PortoSeguro\Validators\Validator;

class CondicaoPagamento
{
    use Serializable;
    use Validator;

    protected ?string $condicaoPagamento = null;

    protected ?string $nomeCondicaoPagamento = null;

    protected ?float $percentualDesconto = null;

    protected ?int $quantidadeParcela = null;

    protected ?float $valorParcela = null;

    protected ?string $primeiroVencimento = null;

    protected ?float $premioLiquido = null;

    protected ?float $desconto = null;

    protected ?float $adicionalFracionamento = null;

    protected ?float $iof = null;

    protected ?float $premioTotal = null;

    /**
     *
     * Código identificador da condição de pagamento. É composto por 3 caracteres numéricos com zeros à esquerda.
     *
     * @example 000
     *
     * @param string|null $condicaoPagamento
     * @return CondicaoPagamento
     */
    public function setCondicaoPagamento(?string $condicaoPagamento): CondicaoPagamento
    {
        $condicaoPagamento = $this->getOnlyDigits($condicaoPagamento);

        if (strlen($condicaoPagamento) > 3) {
            throw new InvalidArgumentException(
                'O código identificado da condição de pagamento possui no máximo 3 dígitos númericos'
            );
        }

        $this->condicaoPagamento = $condicaoPagamento;
        return $this;
    }

    /**
     *
     * Descrição da condição de pagamento.
     *
     * @example A VISTA
     *
     * @param string|null $nomeCondicaoPagamento
     * @return CondicaoPagamento
     */
    public function setNomeCondicaoPagamento(?string $nomeCondicaoPagamento): CondicaoPagamento
    {
        $this->nomeCondicaoPagamento = $nomeCondicaoPagamento;
        return $this;
    }

    /**
     *
     * Percentual de desconto da condição de pagamento
     *
     * @example 10
     *
     * @param float|null $percentualDesconto
     * @return CondicaoPagamento
     */
    public function setPercentualDesconto(?float $percentualDesconto): CondicaoPagamento
    {
        $this->percentualDesconto = $percentualDesconto;
        return $this;
    }

    /**
     * Quantidade de parcelas da condição de pagamento
     *
     * @example 1
     *
     * @param int|null $quantidadeParcela
     * @return CondicaoPagamento
     */
    public function setQuantidadeParcela(?int $quantidadeParcela): CondicaoPagamento
    {
        $this->quantidadeParcela = $quantidadeParcela;
        return $this;
    }

    /**
     * Valor total da parcela da condição de pagamento
     *
     * @example 19.2
     *
     * @param float|null $valorParcela
     * @return CondicaoPagamento
     */
    public function setValorParcela(?float $valorParcela): CondicaoPagamento
    {
        $this->valorParcela = $valorParcela;
        return $this;
    }

    /**
     * Data do primeiro vencimento da condição de pagamento no formato DD/MM/AAAA
     *
     * @example 06/05/2021
     *
     * @param string|null $primeiroVencimento
     * @return CondicaoPagamento
     */
    public function setPrimeiroVencimento(?string $primeiroVencimento): CondicaoPagamento
    {
        $this->primeiroVencimento = $primeiroVencimento;
        return $this;
    }

    /**
     * Valor do prêmio líquido da condição de pagamento
     *
     * @example 160.92
     *
     * @param float|null $premioLiquido
     * @return CondicaoPagamento
     */
    public function setPremioLiquido(?float $premioLiquido): CondicaoPagamento
    {
        $this->premioLiquido = $premioLiquido;
        return $this;
    }

    /**
     * Valor do desconto da condição
     *
     * @example 19.2
     *
     * @param float|null $desconto
     * @return CondicaoPagamento
     */
    public function setDesconto(?float $desconto): CondicaoPagamento
    {
        $this->desconto = $desconto;
        return $this;
    }

    /**
     * Valor dos juros da condição de pagamento
     *
     * @exaple 0
     *
     * @param float|null $adicionalFracionamento
     * @return CondicaoPagamento
     */
    public function setAdicionalFracionamento(?float $adicionalFracionamento): CondicaoPagamento
    {
        $this->adicionalFracionamento = $adicionalFracionamento;
        return $this;
    }

    /**
     * Valor do IOF da condição de pagamento
     *
     * @example 11.88
     *
     * @param float|null $iof
     * @return CondicaoPagamento
     */
    public function setIof(?float $iof): CondicaoPagamento
    {
        $this->iof = $iof;
        return $this;
    }

    /**
     * Valor do prêmio total da condição de pagamento.
     *
     * @example 172.8
     *
     * @param float|null $premioTotal
     * @return CondicaoPagamento
     */
    public function setPremioTotal(?float $premioTotal): CondicaoPagamento
    {
        $this->premioTotal = $premioTotal;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCondicaoPagamento(): ?string
    {
        return $this->condicaoPagamento;
    }

    /**
     * @return string|null
     */
    public function getNomeCondicaoPagamento(): ?string
    {
        return $this->nomeCondicaoPagamento;
    }

    /**
     * @return float|null
     */
    public function getPercentualDesconto(): ?float
    {
        return $this->percentualDesconto;
    }

    /**
     * @return int|null
     */
    public function getQuantidadeParcela(): ?int
    {
        return $this->quantidadeParcela;
    }

    /**
     * @return float|null
     */
    public function getValorParcela(): ?float
    {
        return $this->valorParcela;
    }

    /**
     * @return string|null
     */
    public function getPrimeiroVencimento(): ?string
    {
        return $this->primeiroVencimento;
    }

    /**
     * @return float|null
     */
    public function getPremioLiquido(): ?float
    {
        return $this->premioLiquido;
    }

    /**
     * @return float|null
     */
    public function getDesconto(): ?float
    {
        return $this->desconto;
    }

    /**
     * @return float|null
     */
    public function getAdicionalFracionamento(): ?float
    {
        return $this->adicionalFracionamento;
    }

    /**
     * @return float|null
     */
    public function getIof(): ?float
    {
        return $this->iof;
    }

    /**
     * @return float|null
     */
    public function getPremioTotal(): ?float
    {
        return $this->premioTotal;
    }

}
