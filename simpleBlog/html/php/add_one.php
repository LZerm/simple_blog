<?php
/**
 * Created by PhpStorm.
 * User: ming
 * Date: 2016/12/15
 * Time: 22:45
 */

header("Content-type:text/html;charset=utf-8;");
include("../functions/database.php");
session_start();
get_connection();

$article_id = $_POST["article_id"];
$sql = "update article set beliked = beliked + 1 where article_id = <?php echo $article_id ?>";
mysql_query($sql);

close_connection();