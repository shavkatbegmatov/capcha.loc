<?php
session_start();

function generateCaptchaCode($length = 6) {
    $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789';
    $code = '';
    for ($i = 0; $i < $length; $i++) {
        $code .= $chars[rand(0, strlen($chars)-1)];
    }
    return $code;
}

$code = generateCaptchaCode();
$_SESSION["captcha"] = $code;

header("Content-type: image/png");
$image = imagecreatetruecolor(130, 40);

// Ranglar
$bg = imagecolorallocate($image, 255, 255, 255);
$text_color = imagecolorallocate($image, 0, 0, 0);
$line_color = imagecolorallocate($image, 100, 100, 100);

// Fon
imagefilledrectangle($image, 0, 0, 130, 40, $bg);

// Shovqin chiziqlari
for ($i = 0; $i < 5; $i++) {
    imageline($image, rand(0,130), rand(0,40), rand(0,130), rand(0,40), $line_color);
}

// Matn
$font_size = 5;
$x = 10;
$y = 10;
imagestring($image, $font_size, $x, $y, $code, $text_color);

imagepng($image);
imagedestroy($image);
?>
