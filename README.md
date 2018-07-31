# Laravel Color Palette
Laravel Wrapper for [Color-Thief-PHP](https://github.com/ksubileau/color-thief-php) with additional changes. Grabs the **dominant color** or a **representative color palette** from an image. Uses PHP and GD or Imagick.

This Laravel package is extremely useful to grab **dominant color** or a **representative color palette** from images. See this image for the example.

![example image](https://rawcdn.githack.com/nikkanetiya/laravel-color-palette/master/tests/images/example.png)

## Contents

- [Installation](#installation)
- [Available Methods](#available-methods)
	
## Installation

You can install the package via [Composer](http://getcomposer.org):
```bash
composer require nikkanetiya/laravel-color-palette
```

You must install the service provider (For Laravel < 5.5):

```php
// config/app.php
'providers' => [
    ...
    NikKanetiya\LaravelColorPalette\ColorPaletteServiceProvider::class,
],
```

Register facade:

```php
// config/app.php
'aliases' => [
    ...
    'ColorPalette' => NikKanetiya\LaravelColorPalette\ColorPaletteFacade::class,
],
```

## Available Methods

1. **getColor()** - Use this method to get **most dominant single color** form image

    Example:

    ``` php
    // get most dominant color from image

    $color = ColorPalette::getColor( 'https://rawcdn.githack.com/nikkanetiya/laravel-color-palette/master/tests/images/strawberry.jpeg' );

    // Color provides several getters/properties
    echo $color;             // '#dc5550'
    echo $color->rgbString;  // 'rgb(220,85,80)'
    echo $color->rgbaString; // 'rgba(220,85,80,1)'
    echo $color->int;        // 14439760
    print_r($color->rgb);        // array(220, 85, 80) 
    print_r($color->rgba);       // array(220, 85, 80, 1)
    ```

    #### Options
    ```PHP
    $color = ColorPalette::getColor($sourceImage, $quality = 10, $area = null );
    ```

    By default, `getColor` will have quality -> 10 and specific area -> null.
     - `Quality` can be int. 1 is the highest quality. There is a trade-off between quality and speed. The bigger the number, the faster the palette generation but the greater the likelihood that colors will be missed.
     - `Area` can be array|null $area[x,y,w,h]. It allows you to specify a rectangular area in the image in order to get colors only for this area. It needs to be an associative array with the following keys:
        * $area['x']: The x-coordinate of the top left corner of the area. Default to 0.
        * $area['y']: The y-coordinate of the top left corner of the area. Default to 0.
        * $area['w']: The width of the area. Default to image width minus x-coordinate.
        * $area['h']: The height of the area. Default to image height minus y-coordinate.

2. **getPalette()** - Use this method to find **representative color palette** form image.

    Example:
    
    ``` php
    // get colors from image
    
    $colors = ColorPalette::getPalette( 'https://github.com/nikkanetiya/laravel-color-palette/blob/master/tests/images/strawberry.jpeg' );
    
    foreach($colors as $color) {
        //
    }
    // Colors will be array of Color Objects
    ```
    #### Options
    ```PHP
    $color = ColorPalette::getPalette($sourceImage, $colorCount = 10, $quality = 10, $area = null)
    ```
    
     - `colorCount` can be 2 to 256. It is the number of colors you want to retrieve for the image.
     - `Quality` & `Area` is same as above.

Image Source: `https://www.pexels.com`, `google image`

