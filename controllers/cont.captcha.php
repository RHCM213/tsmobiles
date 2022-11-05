<?php
header("Content-Type: image/png");

$image = imagecreate(120,80);
imagecolorallocate($image,253,245,230);

$font_color = imagecolorallocate($image,97,65,54);
$font = __DIR__ . "/barriecito_regular.ttf";

$text = bin2hex(random_bytes(2));
$_SESSION["captcha"] = $text;

imagettftext($image, 33, 0, 16, 55, $font_color, $font, $_SESSION["captcha"]);
imagepng($image);

?>