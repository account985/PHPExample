<?php
	require_once(dirname(__FILE__).'/../include.php');
	verify();
	$reload = 'article.add.php';
	//把传递过来的信息入库,在入库之前对所有的信息进行校验。
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
	$title = $_POST['title'];
	$author = $_POST['author'];
	$description = $_POST['description'];
	$content = $_POST['content'];
	$date =  time();
	$table = array('title' => $title, 'author' => $author, 'description' => $description, 'content' => $content, 'date' => $date);
	$id = insert($link, TABLE_NAME, $table);
	if($id){
		alertMes('发布文章成功', 'article.manage.php');
	}else{
		alertMes('发布文章失败', 'article.add.php');
	}
	mysqli_close($link);
