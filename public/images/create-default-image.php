<?php
$image = imagecreatetruecolor(300, 300);
$bg = imagecolorallocate($image, 240, 240, 240);
$textColor = imagecolorallocate($image, 150, 150, 150);
imagefill($image, 0, 0, $bg);
$text = "No Image";
$font = 5;
$x = (300 - imagefontwidth($font) * strlen($text)) / 2;
$y = (300 - imagefontheight($font)) / 2;
imagestring($image, $font, $x, $y, $text, $textColor);
header('Content-Type: image/jpeg');
imagejpeg($image, 'default-product.jpg');
imagedestroy($image);
?> 