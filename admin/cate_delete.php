<?php
include('../conn.php');
//第一步：接受数据
$id=$_GET['id'];
//第二步：验证数据有效性
if(!is_numeric($id)){ //is_numeri()函数用来判断传过来的是否为数字
	alert('ID值不是一个数字','cate_list.php');exit;
}
//第三步：构造SQL语句将id作为删除的条件来实现删除功能
$sql="delete from category where id=$id";
$r= mysqli_query($conn,$sql);
//第四步:将执行结果显示出来
if($r){
	alert('删除成功','cate_list.php');
}else{
	echo('删除失败！');
	echo mysqli_error($conn);
}