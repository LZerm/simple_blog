<?php
/**
 * Created by PhpStorm.
 * User: ming
 * Date: 2016/12/16
 * Time: 11:39
 */

header("Content-type:text/html;charset=utf-8");
include_once("functions/database.php");

$article_id = $_GET["article_id"];

$sql = "delete from article where article_id = $article_id";
mysql_query($sql);

header("Location:allArticle.php");