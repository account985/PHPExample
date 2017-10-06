<?php
require_once(dirname(__FILE__).'/../include.php');
$username=$_POST['username'];
$username=addslashes($username);
$password=md5($_POST['password']);
$verify=$_POST['verify'];
$verify1=$_SESSION['verify'];
if(isset($_POST['autoflag'])) {
	$autoFlag=$_POST['autoflag'];
}
if(strtolower($verify)==strtolower($verify1)){
	$link = connect();
	$sql = "select * from admin where username='{$username}' and password='{$password}'";
	$res = mysqli_query($link, $sql);
	$row = mysqli_fetch_assoc($res);
	if($row){
		//如果选了一周内自动登陆
		if(isset($autoFlag)){
			setcookie("adminId",$row['id'],time()+7*24*3600);
			setcookie("adminName",$row['username'],time()+7*24*3600);
		}
		$_SESSION['adminName']=$row['username'];
		$_SESSION['adminId']=$row['id'];
		alertMes("登陆成功","article.add.php");
	}else{
		alertMes("用户名或密码错误", "login.php");
	}
	mysqli_close($link);
}else{
	alertMes("验证码错误", "login.php");
}
