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
            </span>分类管理
            <span class="crumb-step">&gt;
            </span>
            <span>所有分类</span>
            </div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <table>
                <tr>
                    <th style="width: 100px;">分类ID</th>
                    <th style="width: 100px;">分类名称</th>

                </tr>
                <?php 
                    header("Content-type:text/html;charset=utf-8");
                    include_once("functions/database.php");
                    $search_sql = "select * from category";

                    get_connection();
                    $result_set = mysql_query($search_sql);
                    close_connection();
                    if(mysql_num_rows($result_set) == 0){
                        exit("暂无记录!");
                    }
                    while ($row = mysql_fetch_array($result_set)) {
                 ?>
                 <tr>
                    <td style="width: 100px;text-align: center;"><label><?php echo $row["category_id"] ?></label></td>
                    <td style="width: 100px;text-align: center;"><label><?php echo $row["category_name"] ?></label></td>
                 </tr>
                 <?php 
                }
                  ?>
                </table>
            </div>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>