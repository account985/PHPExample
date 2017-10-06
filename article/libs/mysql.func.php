<?php
require_once(dirname(__FILE__).'/../include.php');
/*
*　连接数据库
*/
function connect($host = HOST, $useName = USERNAME, $password = PASSWORD, $dbName = DB_NAME) {
	$link = mysqli_connect($host, $useName, $password) or die("数据库连接失败<br />Error:".mysqli_connect_errno().",".mysqli_connect_error());
	mysqli_set_charset($link, 'utf-8');
	mysqli_select_db($link, $dbName) or die("指定数据库打开失败");
	return $link;
}

/*
*　插入数据
*/
function insert($link, $table, $array){
	$keys = join(",",array_keys($array));
	$vals = "'".join("','",array_values($array))."'";
	$sql = "insert {$table}($keys) values({$vals})";
	mysqli_query($link, $sql);
	return mysqli_insert_id($link);
}

/*
*　更新数据
*/
function update($link, $table, $array, $where=null){
	foreach($array as $key=>$val){
		if($str==null){
			$sep="";
		}else{
			$sep=",";
		}
		$str.=$sep.$key."='".$val."'";
	}
		$sql = "update {$table} set {$str} ".($where==null?null:" where ".$where);
		$result = mysqli_query($link, $sql);
		if($result){
			return mysqli_affected_rows($link);
		}else{
			return false;
		}
}
