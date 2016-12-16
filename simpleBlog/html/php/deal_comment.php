<?php
/**
 * Created by PhpStorm.
 * User: ming
 * Date: 2016/12/15
 * Time: 21:18
 */

header("Content-type:text/html;charset=utf-8;");
include("../functions/database.php");
session_start();
get_connection();

$article_id = $_POST["article_id"];
$becommented = $_POST["user_id"];
$article_content = $_POST["content"];
$commenter = $_SESSION["user_id"];
$currentDate = date("Y-m-d H:i:s");


$sql = "insert into comment VALUES(null,'$article_id','$commenter','$becommented','$article_content','$currentDate')";
mysql_query($sql);
$result = mysql_affected_rows();
if($result >= 0){
    $message = "add_comment_succeed";
}
else{
    $message = "add_comment_error";
}
header("Location:../html/detail.php?article_id=$article_id&message=$message");
close_connection();