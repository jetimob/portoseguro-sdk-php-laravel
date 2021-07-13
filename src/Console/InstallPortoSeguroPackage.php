<?php

namespace Jetimob\PortoSeguro\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Jetimob\PortoSeguro\PortoSeguroServiceProvider;

class InstallPortoSeguroPackage extends Command
{
    protected $signature = 'portoseguro:install';

    protected $description = 'Publishes Porto Seguro\'s configuration';

    public function handle()
    {
        if (File::exists(config_path('portoseguro.php'))) {
            if ($this->confirm('O arquivo de configuração já existe, deseja sobrescrever?', false)) {
                $this->publish(true);
                $this->info('Arquivo de configuração sobrescrito');
            }

            return;
        }

        $this->publish();
        $this->info('Arquivo de configuração copiado para ./config/portoseguro.php');
    }

    private function publish($force = false): void
    {
        $params = [
            '--provider' => PortoSeguroServiceProvider::class,
            '--tag'      => 'config'
        ];

        if ($force) {
            $params['--force'] = '';
        }

        $this->call('vendor:publish', $params);
    }
}
