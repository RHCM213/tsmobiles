<?php
header("Content-Type: image/png");

$image = imagecreate(120,80);

imagecolorallocate($image,253,245,230);

$font_color = imagecolorallocate($image,255,0,0);

$font = __DIR__ . "/barriecito_regular.ttf";

$text = bin2hex(random_bytes(2));

$_SESSION["captcha"] = $text;

imagettftext($image, 33, 0, 15, 55, $font_color, $font, $_SESSION["captcha"]);

imagepng($image);

?>