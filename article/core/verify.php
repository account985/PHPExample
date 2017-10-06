<?php
require_once(dirname(__FILE__).'/../include.php');

function verify() {
  if($_SESSION['adminId'] == '' && $_COOKIE['adminId'] == '') {
  	alertMes("请先登录", 'login.php');
  }
}
