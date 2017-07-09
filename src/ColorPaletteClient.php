<?php

namespace  NikKanetiya\LaravelColorPalette;

use ColorThief\ColorThief;

/**
 * Class ColorPaletteClient
 * @package NikKanetiya\LaravelColorPalette
 */
class ColorPaletteClient
{
    /**
     * Use the median cut algorithm to cluster similar colors.
     *
     * @bug Function does not always return the requested amount of colors. It can be +/- 2.
     *
     * @param mixed      $sourceImage   Path/URL to the image, GD resource, Imagick instance, or image as binary string
     * @param int        $quality       1 is the highest quality. There is a trade-off between quality and speed.
     *                                  The bigger the number, the faster the palette generation but the greater the
     *                                  likelihood that colors will be missed.
     * @param array|null $area[x,y,w,h] It allows you to specify a rectangular area in the image in order to get
     *                                  colors only for this area. It needs to be an associative array with the
     *                                  following keys:
     *                                  $area['x']: The x-coordinate of the top left corner of the area. Default to 0.
     *                                  $area['y']: The y-coordinate of the top left corner of the area. Default to 0.
     *                                  $area['w']: The width of the area. Default to image width minus x-coordinate.
     *                                  $area['h']: The height of the area. Default to image height minus y-coordinate.
     *
     * @return Color
     */
    public function getColor($sourceImage, $quality = 10, $area = null)
    {
        return new Color(ColorThief::getColor($sourceImage, $quality, $area));
    }

    /**
     * Use the median cut algorithm to cluster similar colors.
     *
     * @bug Function does not always return the requested amount of colors. It can be +/- 2.
     *
     * @param mixed      $sourceImage   Path/URL to the image, GD resource, Imagick instance, or image as binary string
     * @param int        $colorCount    It determines the size of the palette; the number of colors returned.
     * @param int        $quality       1 is the highest quality.
     * @param array|null $area[x,y,w,h]
     *
     * @return array[Color]
     */
    public function getPalette($sourceImage, $colorCount = 10, $quality = 10, $area = null)
    {
        $palette = ColorThief::getPalette($sourceImage, $colorCount, $quality, $area);

        if(!$palette) return $palette;

        return array_map(function ($value) {
            return new Color($value);
        }, $palette);
    }
}
