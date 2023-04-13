<?php
session_start();

$code = rand(1000, 9999);

$_SESSION["captcha_code"] = $code;
header('Content-Type: image/jpeg');

$im = imagecreatetruecolor(80, 40);

$bg_color = imagecolorallocate($im, 255, 255, 255);

$text_color = imagecolorallocate($im, 0, 0, 0);

imagefill($im, 0, 0, $bg_color);

imagestring($im, 5, 20, 10, $code, $text_color);

imagejpeg($im);

imagedestroy($im);
?>