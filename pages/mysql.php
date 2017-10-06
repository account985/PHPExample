<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', 'dovedefu');
define('DB_NAME', 'page');
define('TB_NAME', 'page');
$total = 146;
/*$i = 0;
$j = 'name'.($i + 1);
$sql = "INSERT INTO ".DB_NAME."(name) VALUES('$j')";
echo $sql;
exit;*/
$link = mysqli_connect(HOST, USER, PASSWORD);
if(!$link) {
  die('连接数据库失败');
}
mysqli_select_db($link, DB_NAME) or die('打开数据库失败');
mysqli_set_charset($link, 'utf-8');
for($i = 0;$i < $total;$i ++) {
  $j = 'name'.($i + 1);
  $sql = "INSERT INTO ".TB_NAME."(name) VALUES('$j')";
  $res = mysqli_query($link, $sql);
  if($res) {
    echo "插入".$i."成功\n";
  }
}
mysqli_close($link);
