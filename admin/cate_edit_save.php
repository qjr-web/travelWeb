<?php
include('../conn.php');
$id=$_POST['id'];//因为在做修改时，必须要知道被修改的对象是谁，所以传一id作为修改的条件
$catename=$_POST['catename'];
$module=$_POST['module'];
$orderno=$_POST['orderno'];

$sql="update category set catename='$catename' ,module='$module' ,orderno='$orderno' where id=$id";
$re= mysqli_query($conn,$sql);
if($re){
	alert('修改成功','./cate_list.php');
}
else{
	echo "修改失败！";
	echo mysqli_erro($conn);
	//alert('修改失败！','cate_edit.php?id=.$id');
}
?>