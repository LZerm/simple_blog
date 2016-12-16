<?php
/**
 * Created by PhpStorm.
 * User: ming
 * Date: 2016/12/15
 * Time: 18:00
 */

header("Content-type:text/html;charset=utf-8;");
include("../functions/database.php");
session_start();

$title = $_POST["title"];
$content = $_POST["content"];
$userID = $_SESSION["user_id"];
$currentDate = date("Y-m-d H:i:s");
$category = $_POST["category_id"];

$sql = "insert into article VALUES (null,$userID,'$title','$content','$currentDate','','','$category')";

get_connection();
$result = mysql_query($sql);


$result_set = mysql_affected_rows();
if($result_set > 0){
    $message = "add_succeed";
    $sql = "update user set article_count = article_count + 1 where user_id = $userID";
    mysql_query($sql);
    header("Location:../html/addArticle.php?message=$message");
}
else{
    $message = "add_fail";
}
echo $message;

close_connection();