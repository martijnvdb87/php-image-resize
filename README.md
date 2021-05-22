# PHP Image Resize
This simple library allows you to resize and convert images to a different filetype. The supported filetypes are JPG, PNG, GIF and WebP. Animated GIF and WebP files are not supported.

## Installation
You can install the package via composer:
```php
composer require martijnvdb/php-image-resize
```

## Usage
Add the composer autoloader to your application and create a new instance of the ImageResize class given the path to the source images as the first argument.
```php
require __DIR__ . '/vendor/autoload.php';

use Martijnvdb\ImageResize\ImageResize;

$image = new ImageResize(__DIR__ . '/image-1.jpg');
```

### Methods
Use the `export()` method to save the image to the given path. By default it will convert the source image to the given output filetype. In the following example it will convert the original JPG image to a WebP image.
```php
$image = new ImageResize(__DIR__ . '/image-1.jpg');
$image->export(__DIR__ . '/resized/image-1.webp');
```

Using the `setWidth()` and `setHeight()` methods, you can set the maximum size the width and height of the exported image. By default it won't change the aspect ratio of the image. Therefore the image will be scaled up or down to fit within the given size constraints. You can use both the `setWidth()` and `setHeight()` methods when exporting an image, or just a single one.
```php
$image = new ImageResize(__DIR__ . '/image-1.jpg');
$image->setWidth(500);
$image->setHeight(500);
$image->export(__DIR__ . '/resized/image-1.webp');
```

You can use the `ignoreRatio()` to ignore the aspect ratio of the source image and strech the exported image to the given width and height.
```php
$image = new ImageResize(__DIR__ . '/image-1.jpg');
$image->setWidth(500);
$image->setHeight(500);
$image->ignoreRatio();
$image->export(__DIR__ . '/resized/image-1.webp');
```

The `setQuality()` method is used to change the quality of the exported image. It accepts a float between `0` and `1`, with `0` being the worst and `1` being the best quality. The default is `0.9` and can only be used when exporting to JPG, PNG and WebP filetypes.
```php
$image = new ImageResize(__DIR__ . '/image-1.jpg');
$image->setQuality(0.65);
$image->export(__DIR__ . '/resized/image-1.webp');
```

It is also possible to use the static `get()` method for easier method chaining.
```php
$image = ImageResize::get(__DIR__ . '/image-1.jpg')
    ->setWidth(500)
    ->setHeight(500)
    ->setQuality(.8)
    ->ignoreRatio()
    ->export(__DIR__ . '/resized/image-1.webp');
```