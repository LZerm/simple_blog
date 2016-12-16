<?php
/**
 * Created by PhpStorm.
 * User: ming
 * Date: 2016/12/14
 * Time: 23:48
 */
header("Content-type:text/html;charset=utf-8");
include_once("../functions/database.php");

get_connection();
$name = $_POST["name"];
$pwd = $_POST["pwd"];

$sql = "select * from user where user_name = '$name' and user_password = '$pwd'";

$result = mysql_query($sql);
$row = mysql_fetch_array($result);


if(mysql_num_rows($result) > 0){
    session_start();
    $_SESSION["user_id"] = $row["user_id"];
    $_SESSION["user_name"] = $name;
    header("Location:../index.php?user_name=$name");
}
else{
    $message = "error";
    header("Location:../html/login.php?message=$message");
}

close_connection();
