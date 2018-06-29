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
        __DIR__.'../config/trumail.php' => config_path('trumail.php'),
    ]);

  }

  /**
  * Register the application services.
  *
  * @return void
  */
  public function register()
  {

    //Set config file
    if ($this->app['config']->get('trumail') === null) {
      $this->app['config']->set('trumail', require __DIR__.'/./../config/trumail.php');
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
