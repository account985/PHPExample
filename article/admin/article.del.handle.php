<?php
	require_once(dirname(__FILE__).'/../include.php');
	verify();
	$reload = 'article.manage.php';
	$link = connect();
	$id = $_GET['id'];
	$deletesql = "delete from article where id=$id";
	if(mysqli_query($link, $deletesql)){
		alertMes('删除文章成功', $reload);
	}else{
		alertMes('删除文章成功', $reload);
	}
	mysqli_close($link);
?>
