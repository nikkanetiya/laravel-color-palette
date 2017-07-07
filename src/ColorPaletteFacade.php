<?php

namespace Nikkanetiya\LaravelColorPalette;

use Illuminate\Support\Facades\Facade;

/**
 * Class ColorPaletteFacade
 * @package NikKanetiya\LaravelColorPalette
 */
class ColorPaletteFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ColorPaletteClient';
    }
}
