<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台登录</title>
<style>
body {
	margin:0 auto;
	padding:0;
	background-color:#C0C0C0;
	font-family:"宋体";
}
form {
	width:500px;
	height:300px;
	background-color:#F3F3F3;
	margin:100px auto 0;
}
form h1 {
	font-size:24px;
	height:50px;
	line-height:50px;
	text-align:center;
	border-bottom:1px solid #A8A8A8;
	margin-bottom:40px;
}
form p{
	font:"宋体";
	font-size:18px;
	line-height:30px;
	text-align:center;
	margin-top:30px;
}
.button {
	width:120px;
	height:30px;
	background:#8080FF;
	color:#fff;
	border-radius:8px;

}
.input{
	height:25px;
	width:200px;
}
</style>
</head>

<body>
<form action="checklogin.php" method="post">
	<h1>后&emsp;台&emsp;管&emsp;理&emsp;</h1>
	<p>用户名：<input type="text" name="adname" class="input" /></p>
	<p>密&emsp;码：<input type="password" name="password" class="input" /></p>
    <p><input type="submit" value="立即登录" class="button"/></p>
</form>
</body>
</html>