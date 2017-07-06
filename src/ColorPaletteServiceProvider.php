<?php

namespace NikKanetiya\LaravelColorPalette;

use Illuminate\Support\ServiceProvider;

/**
 * Class ColorPaletteClient
 * @package NikKanetiya\LaravelColorPalette
 */
class ColorPaletteServiceProvider extends ServiceProvider
{
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
        $this->app->bind('ColorPaletteClient', function ($app) {
            return new ColorPaletteClient();
        });
    }
}
