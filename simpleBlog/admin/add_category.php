<?php 
	header("Content-type:text/html;charset=utf-8");
	include_once("functions/database.php");
	
	get_connection();
	$categoryName = $_POST["newCategory"];
	//echo $categoryName."    ";
	$sql = "insert into category values(null,'$categoryName')";

	mysql_query($sql);
	$a = mysql_affected_rows();
	//echo $a;
	if( $a >= 0){
		$message = "ok";
	}
	else{
		$message = "error";
	}
	close_connection();
	//echo $message;

	header("Location:addCategory.php?message=$message");


 ?>