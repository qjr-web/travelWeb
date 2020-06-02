<?php
include('../conn.php');
//后台处理四个步骤
//第一步：接受数据
$user_id=$_POST['userid'];
$username=$_POST['username'];
$reply=$_POST['reply'];

//第二步：验证数据有效性
if(strlen($reply)<1){
	alert('您还没有填回复内容哦！','comments_reply.php');exit;
}

//第三步：构造SQL语句将id作为删除的条件来实现删除功能
$sql="insert into reply (user_id,user_name,content) values($user_id,'$username','$reply')";
$r= mysqli_query($conn,$sql);

//第四步:将执行结果显示出来

if($r){
	alert('回复成功','p_personal.php');
}else{
	echo('回复失败！');
	echo mysqli_error($conn);
}