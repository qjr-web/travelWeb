<?php
include('../conn.php');
//后台处理四个步骤
//第一步：接受数据
$id=$_GET['id'];

//第二步：验证数据有效性
if(!is_numeric($id)){ //is_numeri()函数用来判断传过来的是否为数字
	alert('ID值不是一个数字','story_list.php');exit;
}
//在删除数据之前先读取产品图片文件名，把对应的图片也要删除
$sql="select * from story where id=$id";
$rs=mysqli_query($conn,$sql);
if($row=mysqli_fetch_assoc($rs)){
	$img=$row['img'];
}
else{echo'要删除的数据不存在！';exit;}
//第三步：构造SQL语句将id作为删除的条件来实现删除功能
$sql="delete from story where id=$id";
$r= mysqli_query($conn,$sql);
//第四步:将执行结果显示出来
if($r){
	//unlink ()是删除图片的函数,先判断是否有文件名，
	if(strlen($img)>0){
		unlink('../files/'.$img);
	}
	alert('删除成功','story_list.php');
}else{
	echo('删除失败！');
	echo mysqli_error($conn);
}
?>