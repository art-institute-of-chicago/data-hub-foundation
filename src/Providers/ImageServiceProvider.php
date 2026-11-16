<?php

namespace Aic\Hub\Foundation\Providers;

use Aic\Hub\Foundation\Library\Images\DamsImageService;
use Aic\Hub\Foundation\Library\Images\DamsImageServiceFacade;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

/**
 * Provides the `DamsImageService` facade used by HasMediasApi. Applications
 * can override it by binding `damsimageservice` or aliasing `DamsImageService`
 * themselves.
 */
class ImageServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('damsimageservice', function ($app) {
            return new DamsImageService();
        });

        $loader = AliasLoader::getInstance();

        if (!array_key_exists('DamsImageService', $loader->getAliases())) {
            $loader->alias('DamsImageService', DamsImageServiceFacade::class);
        }
    }
}
