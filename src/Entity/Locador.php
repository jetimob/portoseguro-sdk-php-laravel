<?php

namespace Jetimob\PortoSeguro\Entity;

use Jetimob\Http\Traits\Serializable;

class Locador extends PropostaLocatario
{
    protected Endereco $enderecoPrincipal;

    protected ?Endereco $enderecoCobranca;

    /**
     * @param Endereco $enderecoPrincipal
     *
     * @return Locador
     */
    public function setEnderecoPrincipal(Endereco $enderecoPrincipal): Locador
    {
        $this->enderecoPrincipal = $enderecoPrincipal;
        return $this;
    }

    /**
     * @param Endereco|null $enderecoCobranca
     *
     * @return Locador
     */
    public function setEnderecoCobranca(?Endereco $enderecoCobranca): Locador
    {
        $this->enderecoCobranca = $enderecoCobranca;
        return $this;
    }

    /**
     * @return Endereco
     */
    public function getEnderecoPrincipal(): Endereco
    {
        return $this->enderecoPrincipal;
    }

    /**
     * @return Endereco|null
     */
    public function getEnderecoCobranca(): ?Endereco
    {
        return $this->enderecoCobranca;
    }


}
