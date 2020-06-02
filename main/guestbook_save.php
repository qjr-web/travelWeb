<?php
include('../conn.php');

$id=$_POST['userid'];
if(!isset($id)){
	alert('请登录以后再操作!','./p_guest.php');
	
}

$content=$_POST['content'];

if(strlen($content)<1){
	alert('留言内容不能为空','guestbook.php');
	exit;
}
$sql="insert into guestbook(user_id,content) values('$id','$content')";
$rs=mysqli_query($conn,$sql);
if($rs){
	alert('恭喜你，留言成功！','p_guest.php');
}
else{
	alert('登录以后才能留言哦！','p_guest.php');
}
	
?>