<?php

namespace Jetimob\PortoSeguro\Entity;

use Jetimob\Http\Traits\Serializable;
use Jetimob\PortoSeguro\Validators\Validator;

class LocalRisco extends PropostaLocalRisco
{
    use Validator;

    protected string $cep;

    /**
     * @return string
     */
    public function getCep(): string
    {
        return $this->cep;
    }

    /**
     * Código do CEP do endereço, composto por 8 caracteres numéricos, sem máscaras, sem caracteres especiais e sem espaços.
     * Para CEPs com menos de 8 digitos preencher com zeros à esquerda.
     *
     * @param string $cep
     * @return LocalRisco
     */
    public function setCep(string $cep): LocalRisco
    {
        $this->validateCep($cep);
        $this->cep = $cep;
        return $this;
    }

}
