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



<div class="container-fluid">
    <div class="row">
        <div class="col-md-9 col-md-offset-1">
            <form class="form-horizontal" role="form" id="myform" method="post" action="../php/deal_addArticle.php">
                <div class="form-group">
                    <label  class="col-md-2 control-label">分类：</label>
                    <div class="col-md-10">
                        <select name="category_id" >
                            <!--><option value="">请选择</option></!-->
                        <?php

                        header("Content-type:text/html;charset=utf-8");
                        include_once("../functions/database.php");
                        get_connection();
                        $result_set = mysql_query("select * from category");
                        close_connection();

                        while($row = mysql_fetch_array($result_set)){
                            ?>
                            <option value="<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></option>

                            <?php
                        }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-md-2 control-label">标题：</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control"  placeholder="标题" name="title">
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-md-2 control-label">正文: </label>
                    <div class="col-md-10">
                        <textarea class="form-control" rows="15" name="content"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-offset-10 col-md-2">
                        <button type="submit" class="btn btn-default btn-block" onclick="push()"><span class="glyphicon glyphicon-open"></span>&nbsp;上传</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
<script type="text/javascript">
    function push() {
        document.getElementById("myform").submit();
    }
</script>
<?php

    if(!empty($_GET["message"])){
        $message = $_GET["message"];
        if($message == "add_succeed"){
            echo "<script type=text/javascript>alert('上传成功！');</script>";
        }
    }
?>

</body>
</html>