<?php
include('../conn.php');
//后台处理四个步骤
//第一步：接受数据

$userid=$_POST['userid'];
if(!isset($userid)){
	alert('登录以后才能评论哦！',"story_show.php?id=$story_id");
	exit;
}
$story_id=$_POST['story_id'];
$content=$_POST['comment'];

if(strlen($content)<1){
	alert('请输入评论内容！',"story_show.php?id=$story_id");
	exit;
}

$sql="insert into comments (user_id,story_id,content) values($userid,$story_id,'$content')";
$r= mysqli_query($conn,$sql);

if($r){
	alert('评论成功！',"story_show.php?id=$story_id");
	$sql="update story set comment=comment+1 where id=$story_id";
	$re=mysqli_query($conn,$sql);
}else{
	alert('登录以后才能评论哦！',"story_show.php?id=$story_id");
	exit;
}