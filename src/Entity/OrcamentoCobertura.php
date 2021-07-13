<?php


namespace Jetimob\PortoSeguro\Entity;


use Jetimob\Http\Traits\Serializable;

/**
 * Lista de coberturas para cotação / orçamento. É obrigatório informar pelo menos a cobertura do ALUGUEL (Código 001)
 * e não permitidas coberturas com valor menor ou igual à zero. Caso não queira a cobertura, basta não enviá-la.
 */
class OrcamentoCobertura
{
    use Serializable;

    public const ALUGUEL = '001';
    public const IPTU = '002';
    public const CONDOMINIO = '003';
    public const AGUA = '004';
    public const LUZ = '005';
    public const GAS = '006';
    public const DANOS_AO_IMOVEL = '007';
    public const PINTURA_INTERNA = '008';
    public const PINTURA_EXTERNA = '009';
    public const MULTA_RESCISORIA = '010';

    /**
     * Código da cobertura. É composto por 3 caracteres numéricos, com zeros à esquerda. Campo obrigatório.
     * As coberturas disponíveis estão listadas abaixo
     * 001 - ALUGUEL (Obrigatória)
     * 002 - IPTU
     * 003 - CONDOMÍNIO
     * 004 - ÁGUA
     * 005 - LUZ
     * 006 - GÁS
     * 007 - DANOS AO IMÓVEL
     * 008 - PINTURA INTERNA
     * 009 - PINTURA EXTERNA
     * 010 - MULTA RESCISÓRIA
     * @example 001
     */
    protected string $codCobertura;


    /**
     * Valor da importância segurada da cobertura informada. Composto por um valor numérico, sendo 9 digitos inteiros
     * e dois decimais, separados por ponto e sem máscaras ou formatação.
     * Campo obrigatório para a cobertura básica
     * @example 200.85
     */
    protected float $valorIS;

    /**
     * @return string
     */
    public function getCodCobertura(): string
    {
        return $this->codCobertura;
    }

    /**
     * @param string $codCobertura
     * @return OrcamentoCobertura
     */
    public function setCodCobertura(string $codCobertura): OrcamentoCobertura
    {
        $this->codCobertura = $codCobertura;
        return $this;
    }

    /**
     * @return float
     */
    public function getValorIS(): float
    {
        return $this->valorIS;
    }

    /**
     * @param float $valorIS
     * @return OrcamentoCobertura
     */
    public function setValorIS(float $valorIS): OrcamentoCobertura
    {
        $this->valorIS = $valorIS;
        return $this;
    }

    public static function new(string $codCobertura, float $valorIS): self
    {
        return (new static())
            ->setCodCobertura($codCobertura)
            ->setValorIS($valorIS);
    }


}
