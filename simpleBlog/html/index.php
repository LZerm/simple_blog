<?php
header("Content-type:text/html;charset=utf-8");
include("functions/database.php");
session_start();
if(!isset($_SESSION["user_id"])){
    header("Location:html/login.php");
}

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<title>Simple_Blog</title>
	<script src="js/jquery-2.1.4.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
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
			<a class="navbar-brand" href="#">S I M P L E _ B L O G</a>
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
                <li><label><h4> <?php $userName = $_SESSION["user_name"];echo $userName; ?></h4></label></li>
                <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user">&nbsp;</span><span class="caret"></span>&nbsp;</a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="html/personblog.php">写过的文章</a></li>
						<li><a href="#">关注的人</a></li>
                        <li><a href="php/destroy.php">注销</a></li>
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


        $sql = "select * from article order by publish_time desc";
        get_connection();
        $result = mysql_query($sql);
        close_connection();
    ?>
    <div class="col-md-7 col-md-offset-1">

        <?php
            $count = 0;
            while ($row = mysql_fetch_array($result)) {
                ?>
                <div class="col-md-10 " style="background-color:#FFFAF0 ; ">
                    <div class="col-md-1">
                        <br><br>
                        <span class="glyphicon glyphicon-paperclip"></span>
                    </div>
                    <div class="col-md-10">
                        <h3><a href="html/detail.php?article_id=<?php echo $row["article_id"] ?>"><?php echo $row["article_title"] ?></a></h3>
                        <h5>作者：
                            <?php
                                get_connection();
                                $uid = $row["user_id"];
                                $sql = "select * from user where user_id = $uid";
                                $rr = mysql_fetch_array(mysql_query($sql));
                                echo $rr["user_name"];
                                close_connection();
                            ?>
                        </h5>
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
                $count++;
                if($count > 4)
                    break;
            }
        ?>

    </div>


    <div class="col-md-3 col-md-offset-1" >
        <div class="col-md-7">
            <a class="btn btn-warning btn-block" href="html/addArticle.php" role="button">写文章</a>
        </div>
        <div class="col-md-7">
            <br>
        </div>
        <div class="col-md-7">
            <a class="btn btn-warning btn-block" href="html/personblog.php" role="button">自己的文章</a>
        </div>
    </div>











</div>
</div>


</body>
</html>