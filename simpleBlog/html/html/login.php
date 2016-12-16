<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="../css/zhuce.css" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>

</head>

<body>
<div class="main">
    <!-----start-main---->
    <h2> 登陆   or   -&nbsp; <a href="zhuce.php" style="color: whitesmoke">注册</a></h2>
    <form action="../php/deal_login.php" method="post">
        <div class="lable-2">
            <input type="text" class="text" placeholder="name" onfocus="this.value = '';" id="active" name="name">

            <!--<input type="text" class="text" value="Last Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Last Name';}">-->
        </div>
        <div class="clear"> </div>
        <div class="lable-2">
            <!--<input type="text" class="text" value="your@email.com " onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'your@email.com ';}">-->
            <input type="password" class="text" placeholder="password" onfocus="this.value = '';" name="pwd">
        </div>
        <div class="clear"> </div>
        <div class="submit">
            <input type="submit" onclick="myFunction()" value="Login" >
        </div>
        <div class="clear"> </div>

    </form>
    <!-----//end-main---->
</div>

<?php

    if(!empty($_GET["message"])){
        $message = $_GET["message"];
        if($message == "ok"){
            echo '<script type="text/javascript">alert("注册成功！请登陆！^ ^");</script>';
        }


    }
?>


</body>
</html>