<?php

namespace Jetimob\PortoSeguro\Entity;

use Jetimob\Http\Traits\Serializable;
use Jetimob\PortoSeguro\Exceptions\InvalidArgumentException;
use Jetimob\PortoSeguro\Validators\Validator;

class CartaoCredito
{
    use Serializable;
    use Validator;

    protected string $numeroCartao;

    protected string $titularCartao;

    protected string $cpfCnpjTitular;

    protected string $validadeCartao;

    /**
     * @return string
     */
    public function getNumeroCartao(): string
    {
        return $this->numeroCartao;
    }

    /**
     * Número do cartão de crédito criptografado através da API de criptografia.
     * É composto por até 45 caracteres com números, letras maiúsculas ou minúsculas e caracteres especiais,
     * sem espaços. Para criptografar é necessário acionar a API /fianca/v1/comum/criptografias informando
     * os 16 caracteres numéricos do cartão de crédito do cliente, sem máscaras, sem espaços ou caracteres especiais.
     *
     * @required
     * @example vDDbFI+0gdU/XXPijFpY6pvc74QVw0dgU4LxYX2AkMs=
     *
     * @param string $numeroCartao
     * @return CartaoCredito
     */
    public function setNumeroCartao(string $numeroCartao): CartaoCredito
    {
        if (strlen($numeroCartao) > 45) {
            throw new InvalidArgumentException('O número do cartão de crédito criptofragado é composto por até 45 caracteres');
        }

        $this->numeroCartao = $numeroCartao;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitularCartao(): string
    {
        return $this->titularCartao;
    }

    /**
     *
     * Nome do titular do cartão de crédito conforme escrito no plástico.
     * É composto por até 60 caracteres alfanuméricos, sem caracteres especiais. Campo obrigatório.
     *
     * @required
     * @example Antonio da Silva
     *
     * @param string $titularCartao
     * @return CartaoCredito
     */
    public function setTitularCartao(string $titularCartao): CartaoCredito
    {
        $this->validateName($titularCartao);

        $this->titularCartao = $titularCartao;
        return $this;
    }

    /**
     * @return string
     */
    public function getCpfCnpjTitular(): string
    {
        return $this->cpfCnpjTitular;
    }

    /**
     * @param string $cpfCnpjTitular
     * @return CartaoCredito
     */
    public function setCpfCnpjTitular(string $cpfCnpjTitular): CartaoCredito
    {
        $this->validateDocument($cpfCnpjTitular);

        $this->cpfCnpjTitular = $cpfCnpjTitular;
        return $this;
    }

    /**
     * @return string
     */
    public function getValidadeCartao(): string
    {
        return $this->validadeCartao;
    }

    /**
     *
     * Validade do cartão de crédito criptografada através da API de criptografia.
     * É composto por até 25 caracteres com números, letras maiúsculas ou minúsculas e caracteres especiais, sem espaços.
     * Para criptografar é necessário acionar a API /fianca/v1/comum/criptografias informando a data de validade do
     * cartão de crédito do cliente no formato MMAAAA, sem máscaras, sem espaços ou caracteres especiais.
     *
     * @required
     *
     * @param string $validadeCartao
     * @return CartaoCredito
     */
    public function setValidadeCartao(string $validadeCartao): CartaoCredito
    {
        if (strlen($validadeCartao) > 25) {
            throw new InvalidArgumentException('A validade do cartão de crédito criptografada é composta por até 25 caracteres');
        }

        $this->validadeCartao = $validadeCartao;
        return $this;
    }

    public static function new($numeroCartao, $titularCartao, $cpfCnpjTitular, $validadeCartao): self
    {
        return (new static())
            ->setNumeroCartao($numeroCartao)
            ->setTitularCartao($titularCartao)
            ->setCpfCnpjTitular($cpfCnpjTitular)
            ->setValidadeCartao($validadeCartao);
    }
}
