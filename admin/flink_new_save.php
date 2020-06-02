<?php
include('../conn.php');
//后台处理数据的四个步骤

//第一步：接收数据库  
$title=$_POST['title'];
$link_url=$_POST['link_url'];
$content=$_POST['content'];


 //第三步  构造SQL语句，将数据写入数据表，实现发布新闻的功能
 
$sql="insert into flink (title,link_url,content) values ('$title','$link_url','$content')";
$rs= mysqli_query($conn,$sql);


//第四步：将执行结果显示出来
if($rs){
	alert('新增成功','./flink_new.php');
}
else{
	
	alert('新增失败！','flink_new.php');
}
?>