<?php

namespace Jetimob\PortoSeguro\Tests;

use Jetimob\Http\Authorization\OAuth\Storage\FileCacheRepository;
use Jetimob\PortoSeguro\Facades\PortoSeguro;
use Jetimob\PortoSeguro\PortoSeguroServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        PortoSeguro::getHttpInstance()->overwriteConfig(
            'oauth_access_token_repository',
            FileCacheRepository::class,
        );
    }

    /** @inheritDoc */
    protected function getPackageProviders($app)
    {
        return [PortoSeguroServiceProvider::class];
    }


}
