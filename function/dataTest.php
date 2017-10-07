<?php
require_once "data.func.php";

$data = array(
  'id' => 1,
  'name' => 'coder',
  'data' => array(0, 1, 2, 3)
);
$code = 200;
$message = "数据返回成功";
//echo json($code, $message, $data);
header("content-type:text/xml");
echo xml($code, $message, $data);
