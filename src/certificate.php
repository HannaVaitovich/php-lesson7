<?php
include __DIR__ . '/results.php';
$width = getimagesize(__DIR__ . '/cert.png')[0];
$height = getimagesize(__DIR__ . '/cert.png')[1];
$image = imagecreatetruecolor($width, $height);
$im = imagecreatefrompng(__DIR__ . '/cert.png');
$textColor = imagecolorallocate($im, 0, 0, 0);
$nameX = ($width / 2) - $fontSize * mb_strlen($name) / 5;
$textX = ($width / 2) - $fontSize * mb_strlen($text) / 7.5;
imagecopy($image, $im, 0, 0, 0, 0, $width, $height);
imagettftext($im, $fontSize + 10, 0, $nameX, 190, $textColor, './Roboto-Regular.ttf', $name);
imagettftext($im, $fontSize, 0, $textX, 290, $textColor, './Roboto-Regular', $text);
header('Content-type: image/png');
imagepng($im);
imagedestroy($image);
imagedestroy($im);

?>