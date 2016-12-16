<?php
/**
 * Created by PhpStorm.
 * User: ming
 * Date: 2016/12/15
 * Time: 9:38
 */
header("Content-type:text/html;charset=utf-8");
include_once("../functions/database.php");

get_connection();
$name = $_POST["name"];
$pwd = $_POST["pwd"];
$con_pwd = $_POST["confirm_pwd"];

$sql = "select * from user where user_name = '$name'";

$result_rows = mysql_num_rows(mysql_query($sql));

if($result_rows > 0){
    $message = "exit";
    header("Location:../html/zhuce.php?message=$message");
}
else if($pwd != $con_pwd){
    $message = "p_no_cp";
    header("Location:../html/zhuce.php?message=$message");
}
else{
    $sql = "insert into user VALUE (null,'$name','$pwd','','','')";
    mysql_query($sql);
    $result = mysql_affected_rows();
    if($result >= 0){
        $message = "ok";
        //echo $message;
        header("Location:../html/login.php?message=$message");
    }
    else{
        $message = "error";
        header("Location:../html/zhuce.php?message=$message");
    }
}
