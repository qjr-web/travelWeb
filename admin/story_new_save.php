<?php
include('../conn.php');
//第一步：接收数据库  
$title=$_POST['title'];
$cate_id=$_POST['cate_id'];
$author=$_POST['author'];
$content=$_POST['content'];
$img=$_FILES['img'];

//第二步：验证数据的有效性  

if($img['name']){
	$ext=strrchr($img['name'],'.');//截取最后一个.以及后面的内容赋值给$ext,得到文件的拓展名
	$filename=time().rand(1,999).$ext;
	move_uploaded_file($img['tmp_name'],'../files/'.$filename);//上传文件后自动写入到临时文件tmp_name中，必须使用move_uploade_file（）	
}
else{
	$filename='demo.jpg';
	move_uploaded_file($img['tmp_name'],'../files/'.$filename);
}

 //第三步  构造SQL语句，将数据写入数据表，实现发布新闻的功能
 
$sql="insert into story (title,cate_id,author,content,img) values ('$title',$cate_id,'$author','$content','$filename')";
$re= mysqli_query($conn,$sql);


//第四步：将执行结果显示出来
if($re){
	alert('发表成功','./story_new.php');
}
else{
	
	alert('发表失败！','story_new.php');
}
?>