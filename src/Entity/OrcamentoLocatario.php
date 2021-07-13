<?php

namespace Jetimob\PortoSeguro\Entity;

use Jetimob\Http\Traits\Serializable;

class OrcamentoLocatario
{
    use Serializable;

    /**
     * CPF do pretendente / locatário / inquilino. Deve conter 11 digitos numéricos, sem máscaras ou caracteres especiais
     * e caso tenha menos que 11 digitos preencher com zeros à esquerda. Campo obrigatório.
     * @example 20489072887
     */
    protected string $cpfCnpj;

    /**
     * Campo que identifica o titular do orçamento. É composto por 1 caracter maiúsculo, sendo ‘’S’’ para afirmar que o
     * CPF é o titular e ‘N’ para afirmar que não é o titular. Campo obrigatório, sendo necessário ter apenas um único
     * titular.
     * @example S
     */
    protected string $titular;

    /**
     * @return string
     */
    public function getTitular(): string
    {
        return $this->titular;
    }

    /**
     * @param string $titular
     * @return OrcamentoLocatario
     */
    public function setTitular(string $titular): OrcamentoLocatario
    {
        $this->titular = $titular;
        return $this;
    }

    /**
     * @return string
     */
    public function getCpfCnpj(): string
    {
        return $this->cpfCnpj;
    }

    /**
     * @param string $cpfCnpj
     * @return OrcamentoLocatario
     */
    public function setCpfCnpj(string $cpfCnpj): OrcamentoLocatario
    {
        $this->cpfCnpj = $cpfCnpj;
        return $this;
    }

    public static function new(string $titular, string $cpfCnpj): self
    {
        return (new static())
            ->setTitular($titular)
            ->setCpfCnpj($cpfCnpj);
    }
}
