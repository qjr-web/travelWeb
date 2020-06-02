<?php
include('./top.php');
$id=$_GET['id'];
$userid=$_SESSION['userid'];
?>

<style>
body {
	background-color:#DBDBDB;
}
.reply {
	width:500px;
	margin:100px auto;
}
input {
	width:100px;
	height:30px;
	background-color:#FFCB97;
	border:#FF3F00 1px solid;
	border-radius:5px;
	text-align:center;
	margin-left:180px;
	margin-top:20px;
}
</style>
<div class="reply">
<?php
$sql="select comments.*,user.username from comments ,user where comments.user_id=user.id and comments.id=$id";
$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($rs);
echo'<p>回复'.$row['username'].'留言</p>';
?>
	
    <form action="comments_reply_save.php" method="post">
         <input type="hidden" name="username" value="<?php echo $row['username'];?>"/>
         <input type="hidden" name="userid" value="<?php echo $userid ;?>"/>
    	<textarea name="reply" cols="70" rows="20"></textarea>
        <input type="submit" value="回&emsp;复" />
    </form>
</div>
</body>
