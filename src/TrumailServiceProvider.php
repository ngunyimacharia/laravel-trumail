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

    // Copy config file to laravel project
    $this->publishes([
        __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'trumail.php' => config_path('trumail.php'),
    ]);

  }

  /**
  * Register the application services.
  *
  * @return void
  */
  public function register()
  {
    //Set path of local config
    $local_config = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'trumail.php';

    //Set config file
    if ($this->app['config']->get('trumail') === null) {
      $this->app['config']->set('trumail', require $local_config);
    }

    //Set service
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
