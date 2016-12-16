<?php
/**
 * Created by PhpStorm.
 * User: ming
 * Date: 2016/12/15
 * Time: 22:58
 */

session_start();
session_unset();
session_destroy();
header("Location:../html/login.php");