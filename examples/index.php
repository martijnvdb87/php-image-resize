<?php

require __DIR__ . '/../vendor/autoload.php';

use Martijnvdb\ImageResize\ImageResize;

$image = ImageResize::get(__DIR__ . '/image-1.jpg')
    ->setWidth(500)
    ->setHeight(500)
    ->setQuality(.8)
    ->ignoreRatio()
    ->export(__DIR__ . '/resized/image-1.webp');