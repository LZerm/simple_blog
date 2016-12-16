<?php
header("Content-type:text/html;charset=utf-8;");
include("../functions/database.php");
session_start();
get_connection();
?>
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
                    <li> <?php $userName = $_SESSION["user_name"];echo $userName; ?></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user">&nbsp;</span><span class="caret"></span>&nbsp;</a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">写过的文章</a></li>
                            <li><a href="#">关注的人</a></li>
                            <li><a href="../php/destroy.php">注销</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </div>
</nav>

        <div class="container-fluid">
            <div class="row">
                <?php

                $uid = $_SESSION["user_id"];
                $sql = "select * from article where user_id = '$uid' order by publish_time desc";

                $result = mysql_query($sql);

                ?>
                <div class="col-md-10 col-md-offset-2">

                    <?php

                    while ($row = mysql_fetch_array($result)) {
                        ?>
                        <div class="col-md-10 " style="background-color:#FFFAF0 ; ">
                            <div class="col-md-1">
                                <br><br>
                                <span class="glyphicon glyphicon-paperclip"></span>
                            </div>
                            <div class="col-md-10">
                                <h3><a href="../html/detail.php?article_id=<?php echo $row["article_id"] ?>"><?php echo $row["article_title"] ?></a></h3>

                                <br>
                                <h4>
                                    <?php
                                    echo $row["article_content"];
                                    ?>
                                </h4>
                                <br>
                                <label>发布时间：<?php echo $row["publish_time"] ?></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <label> 阅读量：<?php echo $row["clicked"] ?></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <label><span class="glyphicon glyphicon-heart">  </span>：<?php echo $row["beliked"] ?></label>
                            </div>
                        </div>
                        <div class="col-md-6 col-md-offset-1">
                            <br>
                        </div>
                        <?php
                    }
                    ?>

                </div>



            </div>
        </div>




</body>
</html>
<?php
close_connection();
?>