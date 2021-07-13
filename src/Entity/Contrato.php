<?php

namespace Jetimob\PortoSeguro\Entity;

use Jetimob\Http\Traits\Serializable;
use Jetimob\PortoSeguro\Validators\Validator;

/**
 * Dados do contrato de locação do imóvel.
 */
class Contrato
{
    use Serializable;
    use Validator;

    public const LOCACAO_FUTURA = 0;
    public const LOCACAO_EM_VIGOR = 1;
    public const LOCACAO_TEMPO_INDETERMINADO = 2;

    protected string $tipoVigenciaContrato;

    protected string $inicioContrato;

    protected string $fimContrato;

    protected string $inicioSeguro;

    protected string $fimSeguro;

    /**
     * Código da vigencia do contrato de locação. Campo obrigatório e conforme lista abaixo:
     * 0 - LOCAÇÃO FUTURA
     * 1 - LOCAÇÃO EM VIGOR
     * 2 - LOCAÇÃO POR TEMPO INDETERMINADO
     *
     * @required
     * @example 1
     *
     * @param string $tipoVigenciaContrato
     * @return Contrato
     */
    public function setTipoVigenciaContrato(string $tipoVigenciaContrato): Contrato
    {
        $this->validateEnum($tipoVigenciaContrato, [self::LOCACAO_FUTURA, self::LOCACAO_EM_VIGOR, self::LOCACAO_TEMPO_INDETERMINADO]);
        $this->tipoVigenciaContrato = $tipoVigenciaContrato;

        return $this;
    }

    /**
     * Data de inicio da vigencia do contrato de locação no formato DD/MM/AAAA. Esta data será validada de acordo com o
     * tipoVigenciaContrato informado (LOCAÇÃO FUTURA, LOCAÇÃO EM VIGOR E LOCAÇÃO POR TEMPO INDETERMINADO).
     *
     * @required
     * @example 20/08/2021
     *
     * @param string $inicioContrato
     * @return Contrato
     */
    public function setInicioContrato(string $inicioContrato): Contrato
    {
        $this->inicioContrato = $inicioContrato;
        return $this;
    }

    /**
     * Data de término da vigencia do contrato de locação no formato DD/MM/AAAA.
     * Esta data deve ser posterior a data de início do contrato.
     *
     * @required
     * @example 20/08/2021
     *
     * @param string $fimContrato
     * @return Contrato
     */
    public function setFimContrato(string $fimContrato): Contrato
    {
        $this->fimContrato = $fimContrato;
        return $this;
    }

    /**
     * Data de inicio da vigencia do seguro de fiança no formato DD/MM/AAAA.
     * Esta data deve ser maior ou igual à data de início do contrato de locação.
     *
     * @required
     * @example 20/08/2021
     *
     * @param string $inicioSeguro
     * @return Contrato
     */
    public function setInicioSeguro(string $inicioSeguro): Contrato
    {
        $this->inicioSeguro = $inicioSeguro;
        return $this;
    }

    /**
     * Data de término da vigencia do seguro de fiança no formato DD/MM/AAAA.
     * Esta data deve ser posterior a data de início do seguro de fiança
     *
     * @required
     * @example 20/08/2021
     *
     * @param string $fimSeguro
     * @return Contrato
     */
    public function setFimSeguro(string $fimSeguro): Contrato
    {
        $this->fimSeguro = $fimSeguro;
        return $this;
    }

    /**
     * Para informar as datas use a função dateToString
     *
     * @param string $tipoVigenciaContrato
     * @param string $inicioContrato
     * @param string $fimContrato
     * @param string $inicioSeguro
     * @param string $fimSeguro
     * @return static
     */
    public static function new(
        string $tipoVigenciaContrato,
        string $inicioContrato,
        string $fimContrato,
        string $inicioSeguro,
        string $fimSeguro
    ):self {
        return (new static())
            ->setTipoVigenciaContrato($tipoVigenciaContrato)
            ->setInicioContrato($inicioContrato)
            ->setFimContrato($fimContrato)
            ->setInicioSeguro($inicioSeguro)
            ->setFimSeguro($fimSeguro);
    }
}
