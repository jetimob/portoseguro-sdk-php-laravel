<?php

namespace Jetimob\PortoSeguro\Api\Orcamento;

use Jetimob\PortoSeguro\Api\PortoSeguroResponse;
use Jetimob\PortoSeguro\Entity\LocalRisco;
use Jetimob\PortoSeguro\Entity\Oferta;

class OrcamentoResponse extends PortoSeguroResponse
{
    protected string $orcamento;

    protected LocalRisco $localRisco;

    protected array $ofertas;

    public function ofertasItemType(): string
    {
        return Oferta::class;
    }

    /**
     * @return string|null
     */
    public function getOrcamento(): ?string
    {
        return $this->orcamento ?? null;
    }

    /**
     * @return LocalRisco
     */
    public function getLocalRisco(): LocalRisco
    {
        return $this->localRisco;
    }

    /**
     * @return array
     */
    public function getOfertas(): array
    {
        return $this->ofertas ?? [];
    }
}
