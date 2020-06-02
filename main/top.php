<?php
include('../conn.php');
//禁用错误报告
error_reporting(0);
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>旅行中的小故事</title>
<link rel="shortcut icon" href="../img/logo.png"/>
<link rel="stylesheet" href="../css/main.css" />
</head>
<script>
	window.onload=function(){
		var oNav=document.getElementById('nav-ul');
		var aNavLi=oNav.getElementsByTagName('li');
		var i=0;
		for(i=0;i<aNavLi.length;i++){
			aNavLi[i].onclick=function(){
				for(i=0;i<aNavLi.length;i++){
					aNavLi[i].className=''
				}
				this.className='active'
			}
		}
	}
</script>
<body>
<div class="top">
        <div class="main">
            <div class="logo"></div>
            <div class="nav">
                <ul id="nav-ul">
                    <li><a href="index.php" target="_self">首页</a></li>
                    <li><a href="p_story.php" target="_self">旅途故事</a></li>
                    <li><a href="p_method.php" target="_self">旅游攻略</a></li>
                    <li><a href="p_guest.php" target="_self">我要留言</a></li>
                    <li><a href="p_personal.php" target="_self">个人中心</a></li>
                </ul>
            </div>
            <div class="login">
                <a href="register.php" target="_self" class="denglu">注册</a>
                <a href="login.php" class="denglu">登录</a>
                <a href="logout.php" class="denglu">退出登录</a>

            </div>
        </div>
</div>