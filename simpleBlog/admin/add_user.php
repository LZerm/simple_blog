<?php 
	header("Content-type:text/html;charset=utf-8");
	include_once("functions/file_system.php");
	include_once("functions/database.php");

	$name = $_POST["userName"];
	$password = $_POST["password"];
	$confirmPassword = $_POST["confirmPassword"];
	echo $password;
	echo $confirmPassword;
	echo "<br>";
	get_connection();

	//查看名字是否已存在
	$sql = "select * from user where user_name = '$name'";
	$result_rows = mysql_num_rows(mysql_query($sql));
	if($result_rows > 0){
		$message = "exist";
	}
	else if($password != $confirmPassword){
		$message = "p!=cp";
	}
	else{
		
		$sql = "insert into user values(null,'$name','$password','','','')";
				mysql_query($sql);
		$a = mysql_affected_rows();
		echo $a;
		if( $a >= 0){
			$message = "ok";
		}
		else{
			$message = "error";
		}
		
	}
	close_connection();
	echo $message;

	header("Location:addUser.php?message=$message");

 ?>