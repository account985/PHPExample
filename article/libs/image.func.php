<?php
require_once(dirname(__FILE__).'/../include.php');

function verifyImage($type = 1, $length = 4, $pixel = 0, $line = 0, $sess_name = 'verify') {
    $width = 100;
    $height = 30;
    $image = imagecreatetruecolor($width, $height);
    $white = imagecolorallocate($image, 255, 255, 255);
    imagefilledrectangle($image, 0, 0, $width, $height, $white);
    $chars = getRandomString($type, $length);
    $_SESSION[$sess_name] = $chars;
    $fontfiles = array('SIMYOU.TTF', 'DroidSans-Bold.ttf', 'DroidSans.ttf');
    for($i = 0; $i < $length; $i ++) {
      $size = mt_rand(14, 18);
      $angle = mt_rand(-15, 15);
      $x = ($i * 100 / 4) + mt_rand(5, 10);
      $y = mt_rand(20, 26);
      $fontfile = ROOT."fonts/".$fontfiles[mt_rand(0, count($fontfiles) - 1)];
      $color = imagecolorallocate($image, mt_rand(0, 120), mt_rand(0, 120), mt_rand(0, 120));
      $text = substr($chars, $i, 1);
      imagettftext($image, $size, $angle, $x, $y, $color, $fontfile, $text);
    }
    if($pixel) {
      for($i = 0;$i < $pixel;$i ++) {
        $pointColor = imagecolorallocate($image, mt_rand(50, 200), mt_rand(50, 200), mt_rand(50, 200));
        imagesetpixel($image, mt_rand(0, $width - 1), mt_rand(0, $height - 1), $pointColor);
      }
    }
    if($line) {
      for($i = 0;$i < $line;$i ++) {
        $lineColor = imagecolorallocate($image, mt_rand(80, 220), mt_rand(80, 220), mt_rand(80, 220));
        imageline($image, mt_rand(0, $width - 1), mt_rand(0, $height - 1), mt_rand(0, $width - 1), mt_rand(0, $height - 1), $lineColor);
      }
    }
    header("content-type:image/gif;");
    imagegif($image);
    imagedestroy($image);
}
