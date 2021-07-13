<?php

namespace Jetimob\PortoSeguro\Tests;

use Jetimob\PortoSeguro\PortoSeguroServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    /** @inheritDoc */
    protected function getPackageProviders($app)
    {
        return [PortoSeguroServiceProvider::class];
    }


}
