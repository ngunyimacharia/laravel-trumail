<?php

namespace Mashytski\Trumail;

use Illuminate\Support\ServiceProvider;

class TrumailServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
      //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('TrumailService', function ($app) {
                return new TrumailService();
        });
    }

    /**
     * @return array
     */
    public function provides()
    {
        return array('Trumail');
    }

}
