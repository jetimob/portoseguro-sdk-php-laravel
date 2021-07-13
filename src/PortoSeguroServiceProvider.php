<?php

namespace Jetimob\PortoSeguro;

use Illuminate\Container\Container;
use Illuminate\Support\ServiceProvider;
use Jetimob\PortoSeguro\Console\InstallPortoSeguroPackage;

class PortoSeguroServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $src = realpath($raw = __DIR__ . '/../config/portoseguro.php') ?: $raw;

        if ($this->app->runningInConsole()) {
            $this->publishes([$src => config_path('portoseguro.php')], 'config');
            $this->commands([
                InstallPortoSeguroPackage::class,
            ]);
        }

        $this->mergeConfigFrom($src, 'portoseguro');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('jetimob.portoseguro', function (Container $app) {
            return new PortoSeguro($app['config']['portoseguro'] ?? []);
        });

        $this->app->alias('jetimob.portoseguro', PortoSeguro::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides()
    {
        return [
            'jetimob.portoseguro',
        ];
    }
}
