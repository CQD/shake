<?php

define('WIDTH', 1200);
define('HEIGHT', 630);
define('FONT_FILE', __DIR__ . '/../asset/NotoSansCJKtc-Medium.otf');

$width = 1200;
$height = 630;

$input = parseInput();
list($fontSize, $textWidth) = calculateFontSize($input);

$image = imagecreatetruecolor($width, $height);
$bgColor = imagecolorallocate($image, 255, 171, 82);
$textColor = imagecolorallocate($image, 255, 255, 255);
$black = imagecolorallocate($image, 0, 0, 0);

imagefilledrectangle($image, 0, 0, $width, $height, $bgColor);

$textX = $width / 2 - $textWidth / 2;
$textY = $height / 2 + $fontSize * 0.5;
imagefttext($image, $fontSize, $textAngle, $textX, $textY, $textColor, FONT_FILE, $input);

ob_start();
imagepng($image);
imagedestroy($image);
$imageData = ob_get_clean();

header ('Content-Type: image/png');
header("ETag: " . crc32($imageData));
header("Cache-Control: public, max-age=10800");
echo $imageData;

exit;

///////////////////////////////////////////

function parseInput()
{
    $input = @$_SERVER['REQUEST_URI'];
    $input = @str_replace('/og/img/', '', $input);
    $input = @trim($input);
    $input = @trim($input, '/');
    $input = urldecode($input);

    return $input ? "抖・{$input}" : '抖';
}

function calculateFontSize($input)
{
    $bbox = imageftbbox(100, 0, FONT_FILE, $input);
    $textWidth = $bbox[2] - $bbox[0];

    $targetWidth = WIDTH * 1;

    $xsize = 100 * $targetWidth / $textWidth * 0.85;
    $ysize = HEIGHT * 0.5;

    $size = min($xsize, $ysize);

    return [$size, $textWidth * $size / 100];
}
