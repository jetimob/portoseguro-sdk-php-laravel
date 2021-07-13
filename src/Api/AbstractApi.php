<?php

namespace Jetimob\PortoSeguro\Api;

use Jetimob\Http\AbstractApi as HttpAbstractApi;
use Jetimob\Http\Request;
use Jetimob\PortoSeguro\Exceptions\PortoSeguroRequestException;
use Jetimob\PortoSeguro\PortoSeguro;

abstract class AbstractApi extends HttpAbstractApi
{
    protected ?string $exceptionClass = PortoSeguroRequestException::class;

    /**
     * AbstractApi constructor.
     * @param PortoSeguro $portoSeguro
     */
    public function __construct(PortoSeguro $portoSeguro)
    {
        parent::__construct($portoSeguro);
    }

    protected function makeBaseRequest($method, $path, array $headers = [], $body = null): Request
    {
        return new AuthorizedRequest($method, $path, $headers, $body);
    }
}
