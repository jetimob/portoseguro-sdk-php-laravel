<?php

namespace Jetimob\PortoSeguro\Facades;

use Illuminate\Support\Facades\Facade;

class PortoSeguro extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'jetimob.portoseguro';
    }
}
