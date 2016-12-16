
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
			function hideURLbar(){ window.scrollTo(0,1); }
        </script>
		
</head>
 
<body>
	<div class="main">
		 <!-----start-main---->
		 <h2> 注册 </h2>
		 <form action="../php/deal_zhuce.php" method="post">
					<div class="lable-2">
						<input type="text" class="text" placeholder="name" onfocus="this.value = '';" id="active" name="name">
                    </div>

					<div class="clear"> </div>

					<div class="lable-2">
					    <input type="password" class="text" placeholder="password" onfocus="this.value = '';" name="pwd">
					</div>
                     <div class="lable-2">
                         <input type="password" class="text" placeholder="ConfirmPassword" onfocus="this.value = '';" name="confirm_pwd">
                     </div>

					<div class="clear"> </div>

					 <div class="submit">
						<input type="submit" onclick="myFunction()" value="Create account" >
					</div>
			 		<div class="clear"> </div>
					 </form>
		<!-----//end-main---->
	</div>
    <?php

        if(!empty($_GET["message"])){
            $message = $_GET["message"];
            if($message == "exit"){
                echo "<script type='text/javascript'>alert('该昵称已经存在！');</script>";
            }
            else if($message == "p_no_cp"){
                echo '<script type="text/javascript">alert("两次输入的密码不一致！");</script>';
            }
            else if($message == "error"){
                echo '<script type="text/javascript">alert("服务器提了个问题！");</script>';
            }

        }

    ?>
		
	 
</body>
</html>