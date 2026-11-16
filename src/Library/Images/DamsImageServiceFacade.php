<?php

namespace Aic\Hub\Foundation\Library\Images;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Aic\Hub\Foundation\Library\Images\DamsImageService
 */
class DamsImageServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'damsimageservice';
    }
}
