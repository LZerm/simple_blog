<?php 
	header("Content-type:text/html;charset=utf-8");
	include_once("functions/database.php");
	get_connection();

	mysql_query("insert into category values(null,'科技')");
	mysql_query("insert into category values(null,'财经')");

	$password = md5(md5("admin"));
	mysql_query("insert into users values(null,'admin','$password')");
	close_connection();
	echo "成功添加初始化数据";
 ?>