<?php
require_once(dirname(__FILE__).'/../include.php');
$_SESSION == array();
if(isset($_COOKIE[session_name()])) {
  setcookie(session_name(), '', time() - 1);
}
if(isset($_COOKIE['adminId'])) {
  setcookie('adminId', '', time() - 1);
}
if(isset($_COOKIE['adminName'])) {
  setcookie('adminName', '', time() - 1);
}
session_destroy();
header("location:login.php");
