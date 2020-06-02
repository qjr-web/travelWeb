<?php
include('../conn.php');
$username=$_POST['username'];
$title=$_POST['title'];
$cate_id=$_POST['cate_id'];
$content=$_POST['content'];
$img=$_FILES['img'];

//第二步：验证数据的有效性  
if($username==''){
	alert('登录以后才能发布故事!','./p_personal.php');
	exit;
}

if($img['name']){
	$ext=strrchr($img['name'],'.');//截取最后一个.以及后面的内容赋值给$ext,得到文件的拓展名
	$filename=time().rand(1,999).$ext;
	move_uploaded_file($img['tmp_name'],'../files/'.$filename);//上传文件后自动写入到临时文件tmp_name中，必须使用move_uploade_file（）	
}
else{
	$filename='demo.jpg';
	move_uploaded_file($img['tmp_name'],'../files/'.$filename);
}
$sql="insert into story (title,author,cate_id,content,img) values ('$title','$username',$cate_id,'$content','$filename')";
$re= mysqli_query($conn,$sql);


//第四步：将执行结果显示出来
if($re){
	alert('发表成功','./p_personal.php');
}
else{
	
	alert('发表失败！请登录以后才能发布哦！','./p_personal.php');
}
?>