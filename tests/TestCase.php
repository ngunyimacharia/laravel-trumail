<?php
namespace Mashytski\Trumail\Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;

class TestCase extends OrchestraTestCase
{

  /**
   * Load package service provider
   * @param  \Illuminate\Foundation\Application $app
   * @return lasselehtinen\MyPackage\MyPackageServiceProvider
   */
  protected function getPackageProviders($app)
  {
    return ['Mashytski\Trumail\TrumailServiceProvider'];
  }

  /**
   * Load package alias
   * @param  \Illuminate\Foundation\Application $app
   * @return array
   */
  protected function getPackageAliases($app)
  {
    return [
      'Trumail' => 'Mashytski\Trumail\Facades\Trumail'
    ];
  }

}
