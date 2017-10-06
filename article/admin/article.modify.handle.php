<?php
	$id = $_GET['id'];
	$reload = "article.modify.php?id=$id";
	require_once(dirname(__FILE__).'/../include.php');
	verify();
	if(!(isset($_POST['title'])&&(!empty($_POST['title'])))){
		alertMes('标题不能为空', $reload);
		exit;
	}
	if(!(isset($_POST['author'])&&(!empty($_POST['author'])))){
		alertMes('作者不能为空', $reload);
		exit;
	}
	if(!(isset($_POST['description'])&&(!empty($_POST['description'])))){
		alertMes('描述不能为空', $reload);
		exit;
	}
	if(!(isset($_POST['content'])&&(!empty($_POST['content'])))){
		alertMes('内容不能为空', $reload);
		exit;
	}
	$link = connect();
	$id = $_POST['id'];
	$title = $_POST['title'];
	$author = $_POST['author'];
	$description = $_POST['description'];
	$content = $_POST['content'];
	$date =  time();
	$where = "id=$id";
	$table = array('title' => $title, 'author' => $author, 'description' => $description, 'content' => $content, 'date' => $date);
	$isSuccess = update($link, TABLE_NAME, $table, $where);
	if($isSuccess){
		alertMes('修改文章成功', 'article.manage.php');
	}else{
		alertMes('修改文章失败', $reload);
	}
	mysqli_close($link);
?>
