<?php
function getRandomString($type = 1, $length = 4) {
  $str = "";
  if($type == 1) {
    $str .=  join('', range(0, 9));
  }else if($type == 2) {
    $str .= join('', array_merge(range('a', 'z'), range('A', 'Z')));
  }else if($type == 3) {
    $str .= join('', array_merge(range(0, 9), range('a', 'z'), range('A', 'Z')));
  }
  if($length > strlen($str)) {
    exit('字符串长度不够');
  }
  $str = str_shuffle($str);
  return substr($str, 0, $length);
}
