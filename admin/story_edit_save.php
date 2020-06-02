<?php
include('../conn.php');
//后台处理数据的四个步骤

//第一步：接收数据库  
$id=$_POST['id'];//因为在做修改时，必须要知道被修改的对象是谁，所以传一id作为修改的条件
$title=$_POST['title'];
$author=$_POST['author'];
$cate_id=$_POST['cate_id'];
$content=$_POST['content'];
$img=$_FILES['img'];

//判断是否有重新上传图片，如果重新上传了就是新的图片文件，如果没有，把原来的文件名传进去
if($img['name']){
	$ext=strrchr($img['name'],'.');//截取最后一个.以及后面的内容赋值给$ext,得到文件的拓展名
	$filename=time().rand(1,999).$ext;
	move_uploaded_file($img['tmp_name'],'../files/'.$filename);//上传文件后自动写入到临时文件tmp_name中，必须使用move_uploade_file（）		
	//如果要修改图片，就把原来的老图删掉
	$oldimg=$_POST['old_img'];
	if(strlen($oldimg)>0){
		unlink('../files/'.$oldimg);
	}
}
else{
	$filename=$_POST['old_img'];
}

 //第三步  构造SQL语句，将数据写入数据表，实现修改单页的功能
 
$sql="update story set title='$title'  ,author='$author' ,cate_id='$cate_id',content='$content' ,img='$filename' where id=$id";
$re= mysqli_query($conn,$sql);


//第四步：将执行结果显示出来
if($re){
	alert('修改成功','./story_list.php');
}
else{
	
	alert('修改失败！','story_edit.php?id=.$id');
}
?>