<?php

namespace Jetimob\PortoSeguro\Tests;

use Jetimob\PortoSeguro\PortoSeguroServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /** @inheritDoc */
    protected function getPackageProviders($app)
    {
        return [PortoSeguroServiceProvider::class];
    }


}
