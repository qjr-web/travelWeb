<?php
include('../conn.php');
//后台处理数据的四个步骤

//第一步：接收数据库  
$adname=$_POST['adname'];
$password=$_POST['password'];


if(strlen($adname)<1){
	alert('用户名不能为空，请重新添加！','admin_new.php');
}
if(strlen($password)<6){
	alert('密码不能小于六位，请重新添加！','admin_new.php');
}

$sql="select * from admin where adname='$adname'";
$rs=mysqli_query($conn,$sql);//将构造好的SQL语句发往服务器去执行，将执行的结果返回到$rs变量中，$rs叫结果集
if(mysqli_num_rows($rs)!=0){
	alert('用户名已存在','admin_new.php');	
}
else{
	$sql="insert into admin(adname,password) values('$adname','$password')";
	$r=mysqli_query($conn,$sql);
	if(!$r){
		alert('新增失败','admin_new.php');	
	}	
	else{
		alert('新增成功','admin_new.php');
	}
}
?>