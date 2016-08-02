<?php
namespace Mozzos\LMRE\Providers;

use Illuminate\Support\ServiceProvider;
use Monolog\Logger;
use Mozzos\LMRE\LMRE;

class LMREServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/lmre.php' => config_path('lmre.php')
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('mozzos.lmre.php', function($app) {
            return new LMRE();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['mozzos.LMREServiceProvider',\Mozzos\LMRE\Providers\LMREServiceProvider::class];
    }
}
