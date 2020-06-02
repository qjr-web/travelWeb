<?php
include('../conn.php');
error_reporting(E_ALL & ~E_NOTICE);//不让PHP错误警告影响布局
ini_set("error_reporting","E_ALL & ~E_NOTICE");
//后台处理四个步骤
//第一步：接受数据
$userid=$_POST['userid'];
if(!isset($userid)){
	alert('登录以后才能点赞哦！',"story_show.php?id=$story_id");
	exit;
	alert('ceshi');
}
$story_id=$_POST['story_id'];

$sql="select * from good where user_id=$userid and story_id=$story_id";
$rs=mysqli_query($conn,$sql);
if(mysqli_num_rows($rs)!=0){
	alert('您已为本文点赞,不用重复点赞哦!',"story_show.php?id=$story_id");
	exit;
}


$sql="insert into good (user_id,story_id) values($userid,$story_id)";
$r= mysqli_query($conn,$sql);
if($r){
	alert('点赞成功!',"story_show.php?id=$story_id");
	$sql="update story set good=good+1 where id=$story_id";
	$re=mysqli_query($conn,$sql);
	
}else{
	alert('登录以后才能点赞哦！',"story_show.php?id=$story_id");
}