<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <title>Simple_Blog</title>
    <script src="../js/jquery-2.1.4.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</head>


<body style="padding-top: 70px; background-color: moccasin">
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="row">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header" >
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php">S I M P L E _ B L O G</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group input-group ">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">搜索</button>
                </form>

                <ul class="nav navbar-nav navbar-right">
                    <!--<li><a href="#">Link</a></li>-->
                    <li><?php session_start(); $userName = $_SESSION["user_name"];echo $userName; ?></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user">&nbsp;</span><span class="caret"></span>&nbsp;</a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">写过的文章</a></li>
                            <li><a href="#">关注的人</a></li>

                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </div>
</nav>

<?php
    header("Content-type:text/html;charset=utf-8;");
    include("../functions/database.php");

    $article_id = $_GET["article_id"];
//    echo $article_id;
    $sql = "select * from article where article_id = '$article_id'";
    get_connection();
    $result = mysql_query($sql);

    if(!empty($result)){
        $row = mysql_fetch_array($result);
    }
    $sql = "update article set clicked = clicked + 1";
    mysql_query($sql);
    close_connection();
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="background-color: #FFFAF0">
            <div class="col-md-12" style="text-align: center;"><h1><?php echo $row["article_title"] ?></h1></div>
            <div class="col-md-2 col-md-offset-10">
                <h8>作者：
                    <?php
                    get_connection();
                    $uid = $row["user_id"];
                    $sql = "select * from user where user_id = $uid";
                    $rr = mysql_fetch_array(mysql_query($sql));
                    echo $rr["user_name"];
                    close_connection();
                    ?>
                </h8>
            </div>
            <div class="col-md-12" style="text-align: center;">
                <h4><?php echo $row["article_content"] ?></h4>
            </div>

            <div class="col-md-6 col-md-offset-5">
                <label><h8>发布时间：<?php echo $row["publish_time"] ?></h8></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label><h8>阅读量：   <?php echo $row["clicked"] ?></h8></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label><a href="#" onclick="add_one()"><h8><span class="glyphicon glyphicon-thumbs-up"></span></h8></a> ：<?php echo $row["beliked"] ?></label>
                <script>
//                  未完成的点赞功能   AJAX实现
                    function add_one()
                    {
                        var xmlhttp;
                        if (window.XMLHttpRequest)
                        {
                            // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
                            xmlhttp=new XMLHttpRequest();
                        }
                        else
                        {
                            // IE6, IE5 浏览器执行代码
                            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        xmlhttp.onreadystatechange=function()
                        {
                            if (xmlhttp.readyState==4 && xmlhttp.status==200)
                            {

                            }
                        }
                        xmlhttp.open("POST","../php/add_one.php?article_id=<?php echo $row["article_id"] ?>",true);
                        xmlhttp.send();
                    }
                </script>
            </div>

            <div class="col-md-12" style="background-color: #d5d5d5">
                <label>发布评论：</label>
                <form action="../php/deal_comment.php" method="post">
                    <input type="hidden" name="article_id" value="<?php echo $row["article_id"] ?>">
                    <input type="hidden" name="user_id" value="<?php echo $row["user_id"]?>">
                    <textarea class="form-control" rows="7" name="content"></textarea>
                    <div class="col-md-2 col-md-offset-11">
                        <span class="glyphicon glyphicon-send"></span>
                        <input type="submit" value="评论">
                    </div>

                </form>
            </div>

        </div>



    </div>
</div>
<?php
    if(!empty($_GET["message"])){
        $message = $_GET["message"];
        if($message == "add_comment_succeed") {
            echo '<script type=text/javascript>alert("评论成功！");</script>';
        }
    }

?>

</body>
</html>