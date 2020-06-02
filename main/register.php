
<?php
include('top.php');
?>
<link href="../css/register.css" rel="stylesheet" />
<div class="middle">
	<div class="left">
    	<img src="../img/p3.jpg" />
    	<p>每天都是一次新的旅行</p>
        <p>每一个和我们走过一段的人都值得感激</p>
        <p>生命，不长不短</p>
        <p>刚好够用来好好看看这个世界</p>
        <p>——《最好的时光在路上》</p>
    	
    </div>
    <div class="right">
    	<div style="font-size:24px">欢迎注册</div>
        <form method="post" action="checkregister.php">
            <div>
            	<span>昵&nbsp;&nbsp;称：</span>
            	<input type="text" name="username" />
            </div>
            <div>
            	<span>密&nbsp;&nbsp;码：</span>
            	<input type="password" name="password"/>
            </div>
            <div>
            	<span>确认密码：</span>
            	<input type="password" name="password1" />
            </div>
            <div style="text-align:center ; font-size:24px; margin-top:40px;">
            	<input type="submit" name="submit"  value="立即注册" style="background-color:#FFCAE4; width:160px; height:40px; border:#FFF solid 2px ; font-size: 24px ; " />
                <a href="login.php" target="_self" style="font-size:14px; text-decoration:underline;">已注册？直接登录></a>
            </div>
            
        </form>
    </div>
</div>
</body>
</html>