<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>博客后台管理</title>
    <link rel="stylesheet" type="text/css" href="css/common.css"/>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <script type="text/javascript" src="js/libs/modernizr.min.js"></script>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.php" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="index.php">首页</a></li>
                <li><a href="#" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li>管理员</li>
                <li><a href="login.php">退出</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>常用操作</a>
                    <ul class="sub-menu">
                        <li><a href="bowen.php"><i class="icon-font">&#xe008;</i>博文管理</a></li>
                        <li><a href="user.php"><i class="icon-font">&#xe005;</i>用户管理</a></li>
                        <li><a href="category.php"><i class="icon-font">&#xe006;</i>分类管理</a></li>
                        <li><a href="comment.php"><i class="icon-font">&#xe012;</i>评论管理</a></li>
                        
                    </ul>
                </li>
                
            </ul>
        </div>
    </div>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list">
            <i class="icon-font"></i>首页
            <span class="crumb-step">&gt;
            </span>博文管理
            <span class="crumb-step">&gt;
            </span>
            <span>新增作品</span>
            </div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
   

                <form action="add_article.php" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody><tr>
                            <th width="120"><i class="require-red">*</i>分类：</th>
                            <td>
                                <select name="category_id" id="catid" class="required">
                                    <!--><option value="">请选择</option></!-->
                                    <?php

                                        header("Content-type:text/html;charset=utf-8");
                                        include_once("functions/database.php");
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
                            </td>
                        </tr>
                            <tr>
                                <th><i class="require-red">*</i>标题：</th>
                                <td>
                                    <input class="common-text required" id="title" name="article_title" size="50" value="" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th>内容：</th>
                                <td><textarea name="article_content" class="common-textarea" id="content" cols="30" style="width: 98%;" rows="20"></textarea></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody></table>
                </form>

                <?php 
                    if(!empty($_GET["message"])){
                        $message = $_GET["message"];
                        if($message == "ok"){                       
                            echo '<script type=text/javascript>alert("添加成功！");</script>';
                        }
                    }
                    
                 ?>
            </div>
        </div>

    </div>
    <!--/main-->
</div>
</body>
</html>