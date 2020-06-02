<?php
include('../conn.php');
$id=$_POST['id'];//因为在做修改时，必须要知道被修改的对象是谁，所以传一id作为修改的条件
$title=$_POST['title'];
$link_url=$_POST['link_url'];
$content=$_POST['content'];

$sql="update flink set title='$title' ,link_url='$link_url' ,content='$content' where id=$id";
$re= mysqli_query($conn,$sql);
if($re){
	alert('修改成功','./flink_list.php');
}
else{
	echo "修改失败！";
	echo mysqli_erro($conn);
	//alert('修改失败！','cate_edit.php?id=.$id');
}
?>