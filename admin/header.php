<?php
include('../conn.php');
session_start();	//启动会话
if(!isset($_SESSION['adid'])){
	alert('请登录以后再操作!','./login.php');
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8"/>
<title>后台管理系统</title>
<link rel="shortcut icon" href="../img/logo.png"/>
<link href="css/index.css" type="text/css" rel="stylesheet"/>
</head>
<body>
	<header> 	<h1>网站后台管理系统</h1>
        <p>
        	<a href="./index.php">系统首页</a>
        	<a href="./logout.php">安全退出</a>
        </p>
	</header>
    <section>
    	<nav>
        	<h3>
   欢迎您来到管理后台</h3>
            <p>登录名：<strong><?php echo $_SESSION['adname'];?></strong>
            <dl>
            	<dt>分类管理</dt>
                <dd>
                	<a href="./cate_new.php">-&emsp;新增分类</a>
                    <a href="./cate_list.php">-&emsp;分类列表</a>
                </dd>
                <dt>旅游故事管理</dt>
                <dd>
                	<a href="story_new.php">-&emsp;分享故事</a>
                    <a href="story_list.php">-&emsp;故事列表</a>
                    <a href="method_list.php">-&emsp;攻略列表</a>
                </dd>
                <dt>留言管理</dt>
                <dd>
                	<a href="guestbook_list.php">-&emsp;留言列表</a>
                </dd>
                <dt>评论管理</dt>
                <dd>
                    <a href="comment_list.php">-&emsp;评论列表</a>
                </dd>
                <dt>收藏管理</dt>
                <dd>
                    <a href="collect_list.php">-&emsp;收藏列表</a>
                </dd>
                <dt>点赞管理</dt>
                <dd>
                    <a href="good_list">-&emsp;点赞列表</a>
                </dd>
                <dt>友情链接管理</dt>
                <dd>
                	<a href="flink_new.php">-&emsp;新增友情链接</a>
                    <a href="flink_list">-&emsp;友情链接列表</a>
                </dd>
                <dt>用户管理</dt>
                <dd>
                    <a href="user_list">-&emsp;用户列表</a>
                </dd>
                <dt>管理员管理</dt>
                <dd>
                	<a href="admin_new.php">-&emsp;新增管理员</a>
                    <a href="admin_list">-&emsp;管理员列表</a>
                </dd>
            </dl>
        </nav>  
