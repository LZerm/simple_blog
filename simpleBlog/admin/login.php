<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>博客后台管理</title>
    <link href="css/admin_login.css" rel="stylesheet" type="text/css" />
</head>
<body>
        <?php 
        
            if(!empty($_GET["message"])){

                $message = $_GET["message"];
                if($message == "error"){
                    echo "<script type=text/javascript>alert('用户名或密码错误，请重新登陆！');</script>";
                }
            }
         ?> 
<div class="admin_login_wrap">
    <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;后台管理</h1>
    <div class="adming_login_border">
        <div class="admin_input">
            <form action="Login_.php" method="post">
                <ul class="admin_items">
                    <li>
                        <label for="user">用户名：</label>
                        <input type="text" name="username"  id="user" size="40" class="admin_input_style" />
                    </li>
                    <li>
                        <label for="pwd">密码：</label>
                        <input type="password" name="pwd" id="pwd" size="40" class="admin_input_style" />
                    </li>
                    <li>
                        <input type="submit" tabindex="3" value="提交" class="btn btn-primary" />
                    </li>
                </ul>
            </form>
        </div>


    </div>
</div>
</body>
</html>