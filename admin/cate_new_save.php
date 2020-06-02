<?php
include('../conn.php');
//后台处理数据的四个步骤

//第一步：接收数据库  
$catename=$_POST['catename'];
$module=$_POST['module'];
$orderno=$_POST['orderno'];


//第二步：验证数据的有效性
if(strlen($catename)<1){
	alert('分类名不能为空！','./cate_new.php');
}

 //第三步  构造SQL语句，将数据写入数据表，实现发布新闻的功能
 
$sql="insert into category (catename,module,orderno) values ('$catename','$module',$orderno)";
$rs= mysqli_query($conn,$sql);


//第四步：将执行结果显示出来
if($rs){
	alert('新增成功','./cate_new.php');
}
else{
	
	alert('新增失败！','cate_new.php');
}
?>