<?php
include('../conn.php');
//后台处理四个步骤
//第一步：接受数据
$userid=$_POST['userid'];
if(!isset($userid)){
	alert('登录以后才能收藏哦！',"story_show.php?id=$story_id");
	exit;
}
$story_id=$_POST['story_id'];

$sql="select * from collect where user_id=$userid and story_id=$story_id";
$rs=mysqli_query($conn,$sql);
if(mysqli_num_rows($rs)!=0){
	alert('本文已收藏！',"story_show.php?id=$story_id");
	exit;
}
else{
$sql="insert into collect (user_id,story_id) values($userid,$story_id)";
$r= mysqli_query($conn,$sql);
if($r){
	alert('收藏成功！',"story_show.php?id=$story_id");
	$sql="update story set collect=collect+1 where id=$story_id";
	$re=mysqli_query($conn,$sql);
}else{
	alert('登录以后才能收藏哦！',"story_show.php?id=$story_id");
	exit;
}
}