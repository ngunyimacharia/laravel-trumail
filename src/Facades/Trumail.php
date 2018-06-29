<?php

namespace Mashytski\Trumail\Facades;

use Illuminate\Support\Facades\Facade;

class Trumail extends Facade
{

  /**
  *
  * @return string
  */
  protected static function getFacadeAccessor()
  {
    return 'TrumailService';
  }


}
