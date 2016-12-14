<?php 
	header("Content-type:text/html;charset=utf-8");
	include_once("functions/file_system.php");
	include_once("functions/database.php");

	$user_id = 1;
	$category_id = $_POST['category_id'];
	$title = $_POST['article_title'];
	$content = $_POST['article_content'];
	$currentDate = date("Y-m-d H:i:s"); 

	$sql = "insert into article values(null,$user_id,'$title','$content','$currentDate','','','$category_id')";
	
	get_connection();
	mysql_query($sql);
	$a = mysql_affected_rows();
	echo $a;
	if( $a >= 0){
		$message = "ok";
	}
	else{
		$message = "error";
	}
	echo $message;
	close_connection();

	header("Location:addArticle.php?message=$message");

 ?>