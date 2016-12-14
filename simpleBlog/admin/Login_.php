<?php 
	header("Content-type:text/html;charset=utf-8");
	include_once("functions/database.php");

	get_connection();
	$name = $_POST["username"];
	$pwd = $_POST["pwd"];

	$sql = "select * from administrator where admin_name = '$name' and admin_password = '$pwd'";

	$result = mysql_query($sql);
	if(mysql_num_rows($result) > 0){
		header("Location:index.html");
	}
	else{
		$message = "error";
		header("Location:login.php?message=$message");
	}

	close_connection();

 ?>