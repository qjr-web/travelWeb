
<?php
include "../conn.php"; 
//第一步：连接数据
$username=$_POST['username'];
$password=$_POST['password'];

//第二步：验证数据的有效性
if(strlen($username)<1){
	echo'用户名不能为空！';exit;
}

if(strlen($password)<6){
	echo'密码不能小于6位数！';exit;
}
echo'数据已正常提交！';


//第三步：构造SQL语句，查询数据库，返回查到的数据，验证用户名和密码是否在数据库中存在。
$sql="select*from user where username='$username' and  password='$password'";
$rs=mysqli_query($conn,$sql);//将构造好的SQL语句发往服务器去执行，将执行的结果返回到$rs变量中，$rs叫结果集
//mysqli_num_rows

//从结果集读取数据，返回关联数组，以数据库中的字段名作为数组的键名
if($row=mysqli_fetch_assoc($rs)){
	//如果能从结果集提取到数据，则表示提供的用户名和密码在数据库中存在，登录成功
	session_start();
	$_SESSION['username']=$row['username'];
	$_SESSION['userid']=$row['id'];
	header('location:index.php');
}
else{
	//登录失败
	echo'用户名或密码错误，请重试！';exit;
}

?>
