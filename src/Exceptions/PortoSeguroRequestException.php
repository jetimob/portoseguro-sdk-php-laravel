<?php

namespace Jetimob\PortoSeguro\Exceptions;

use GuzzleHttp\Exception\RequestException;
use Jetimob\Http\Contracts\HydratableContract;
use Jetimob\Http\Traits\Serializable;

class PortoSeguroRequestException extends RequestException implements PortoSeguroException, HydratableContract
{
    use Serializable;

    protected ?int $errorCode = null;
    protected ?string $errorMessage = null;
    protected ?string $mensagem = null;

    /**
     * @return int|null
     */
    public function getErrorCode(): ?int
    {
        return $this->errorCode;
    }

    /**
     * @return string|null
     */
    public function getErrorMessage(): ?string
    {
        return $this->errorMessage;
    }

    /**
     * @return string|null
     */
    public function getMensagem(): ?string
    {
        return $this->mensagem;
    }

    public function getError(): string
    {
        return sprintf(
            '[%d]: %s',
            $this->errorCode,
            $this->errorMessage ?: $this->mensagem ?: 'Erro desconhecido'
        );
    }
}
