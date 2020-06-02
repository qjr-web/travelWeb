<?php
header('content-type:text/html; charset=utf-8');
$conn=mysqli_connect('localhost','root','','travel') or die('数据库连接出错');
mysqli_query($conn,'set names utf8');	//将这个数据库的编码设置为utf8 的格式，避免乱码

//弹出提示框然后跳转到指定的URL
function alert($str,$url){
	echo'<script type="text/javascript">alert("'.$str.'");window.location.href = "'.$url.'";</script>';
	
}
ini_set("error_reporting","E_ALL & ~E_NOTICE");//不让PHP错误警告影响布局

function promt(){
	echo'<script type="text/javascript">promt("'.$str.'")</script>';
}
?>
