<?php
    session_start();
    $string = md5(time());
    $string = substr($string, 0, 6);
    $_SESSION['captcha'] = $string;
    $img = imagecreate(100, 35);
    $background = imagecolorallocate($img, 255, 0, 0);
    $text_color = imagecolorallocate($img, 255, 255, 255);
    imagestring($img, 20, 25, 10, $string, $text_color);

    header('Content-type: image/png');
    imagepng($img);
    imagedestroy($img);
?>