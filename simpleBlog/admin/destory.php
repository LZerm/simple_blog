<?php
/**
 * Created by PhpStorm.
 * User: ming
 * Date: 2016/12/16
 * Time: 11:23
 */
session_start();
session_unset();
session_destroy();
header("Location:login.php");