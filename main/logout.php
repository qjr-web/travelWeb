<?php

//要推出登录。直接清除session传过来的数据
include('../conn.php');//要使用conn.php中的提示框跳转

//在使用session之前必须开启session文件，这样才是操作的全局session，不然就是操作当前的页面，对其他页面无效
session_start();
$_SESSION=array();//将SESSION定义为空数组，清除所有数据即可
session_destroy();//清除session缓存文件。session 默认情况下是以文件形式存在电脑上的，所以要把session文件清除掉
alert('退出成功，欢迎下次再来！','./login.php');

?>