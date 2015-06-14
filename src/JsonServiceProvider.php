<?php

namespace Lukaserat\WebmozartJson;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class JsonServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('webmozart-json', function ($app) {
            return $encoder = new JsonWrapper;
        });
    }
    /**
     * Publish the plugin configuration.
     */
    public function boot()
    {
        AliasLoader::getInstance()->alias(
            'LukaseratJson', 'Lukaserat\WebmozartJson\JasonFacade'
        );
    }

}