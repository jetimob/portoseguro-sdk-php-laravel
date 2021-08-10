<?php

namespace Jetimob\PortoSeguro\Entity;

use Jetimob\Http\Traits\Serializable;

class Beneficios
{
    use Serializable;

    protected ?string $descricao;

    protected ?string $titulo;

    protected ?string $codigo;

    /**
     * @return string|null
     */
    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    /**
     * Descrição do benefício concedido pela Porto Seguro.
     *
     * @example Serviços para a sua residência sem nenhum custo.
     *
     * @param string|null $descricao
     * @return Beneficios
     */
    public function setDescricao(?string $descricao): Beneficios
    {
        $this->descricao = $descricao;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    /**
     * Título do benefício concedido pela Porto Seguro
     *
     * @example: 3 Meses de REPPARA! Grátis
     *
     * @param string|null $titulo
     * @return Beneficios
     */
    public function setTitulo(?string $titulo): Beneficios
    {
        $this->titulo = $titulo;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    /**
     * Código identificador do benefício concedido pela Porto Seguro.
     *
     * @example 001
     *
     * @param string|null $codigo
     * @return Beneficios
     */
    public function setCodigo(?string $codigo): Beneficios
    {
        $this->codigo = $codigo;
        return $this;
    }

    /**
     * @param $titulo
     * @param $descricao
     * @param $codigo
     * @return static
     */
    public static function new($titulo, $descricao, $codigo): self
    {
        return (new static())
            ->setTitulo($titulo)
            ->setDescricao($descricao)
            ->setCodigo($codigo);
    }
}
