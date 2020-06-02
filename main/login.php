<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>login</title>
<link rel="stylesheet" href="../css/login.css" />
</head>

<body>

<div class="middle">
	<div class="left"><img src="../img/login.jpg" /></div>
    <div class="back">
       	<a href="index.php" target="_self"><-返回首页</a>
    </div>

    <div class="right">
    	<div style="font-size:24px">欢迎登陆旅游故事分享网</div>
        <form method="post" class="form1" action="checklogin.php">
        	<div>
            	<span>用户名:</span>
            	<input type="text" name="username"  />
            </div>
            <div>
            	<span>密&nbsp;码：</span>
            	<input type="password" name="password"  />
            </div>
            <!---<div>
            	<span>验证码：</span>
            	<input type="text" name="yanzhengma" class="yanzhengma"  />
            </div>--->
            <div style="text-align:center ; font-size:24px; margin-top:40px;">
            	<input type="submit" name="submit" class="button1" value="立即登录"  />
                <a href="register.php" target="_self" style="font-size:14px; text-decoration:underline;">未注册？马上注册></a>
            </div>
            
        </form>
    </div>
</div>
</body>


</html>
