<?php

namespace Jetimob\PortoSeguro;

use Jetimob\Http\Contracts\HttpProviderContract;
use Jetimob\Http\Http;
use Jetimob\PortoSeguro\Api\Orcamento\OrcamentoApi;
use Jetimob\PortoSeguro\Api\Proposta\PropostaApi;

class PortoSeguro implements HttpProviderContract
{
    protected Http $client;
    protected array $config;

    public function __construct(array $config = [])
    {
        $this->client = new Http($config['http'] ?? []);
        $this->config = $config;
    }

    /**
     * @return Http
     */
    public function getClient(): Http
    {
        return $this->client;
    }

    /**
     * @return array
     */
    public function getConfig(): array
    {
        return $this->config;
    }

    /**
     * Retorna uma data no formato DD/MM/AAAA.
     *
     * @param int|string $day
     * @param int|string $month
     * @param int|string $year
     * @return string
     */
    public function dateToString($day, $month, $year): string
    {
        return sprintf('%02s/%02s/%s', $day, $month, $year);
    }

    public function getHttpInstance(): Http
    {
        return $this->client;
    }

    public function orcamento(): OrcamentoApi
    {
        return new OrcamentoApi($this);
    }

    public function proposta(): PropostaApi
    {
        return new PropostaApi($this);
    }
}
