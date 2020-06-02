<?php
include('./top.php');
$userid=$_SESSION['userid'];
?>
<style>
.showbox1 {
	width:1000px;
	background-color:#FFEBE1;
	margin:20px auto;
	color:#004080;
}
.showbox1 h1{
	padding-top:20px;
}
.showbox1 h3 {
	height:30px;
	line-height:30px;
	text-align:center;
}
.showbox1 h3 span {
	padding-right:50px;
}
.showbox1 p {
	line-height:30px;
	padding:0 40px;
}

.comment {
	width:500px;
}
.good {
	width:70px;
	background-color:#FFAE88;
	border:#EA4D00 solid 1px;
	border-radius:8px;
	margin-left:20px;
}
form{
	display:inline-block;
}
form em {
	font-size:32px;
}
.showbox1 table {
	color:#000;
	width:1000px;
	border-top:#E5E5E5 solid 1px;
	background-color:#F6F6F6;
}
.time {
	width:100px;

}
</style>
<div class="showbox1">
<?php
$id=$_GET['id'];
$sql="update story set hits=hits+1 where id=$id";
$rs=mysqli_query($conn,$sql);
$sql="select * from story where id=$id";
$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($rs);
$count=mysqli_num_rows($rs);


echo'  <h1>'.$row['title'].'</h1>';
echo'	<h3><span>作者：'.$row['author'].'</span><span>'.date('Y-m-d',strtotime($row['intime'])).'</span><span>浏览量：'.$row['hits'].'</span></h3>';
echo'	<p>'.$row['content'].'</p>';

?>
  	<form action="comments_save.php" method="post">
    	<input type="hidden" name="story_id" value="<?php echo $row['id'];?>"/>  
    	<input type="hidden" name="userid" value="<?php echo $userid;?>"/>    	
        <textarea name="comment" class="comment" cols="2" ></textarea> 		
        <span><input type="submit" value="评&nbsp;&nbsp;论" class="good"/>
        <?php
		$sql="select * from comments where story_id=$id";
		$rs=mysqli_query($conn,$sql);
		$count=mysqli_num_rows($rs);
        ?>
        <em><?php echo $count;?></em>
        </span>
    </form>

  	<form action="good_save.php" method="post">
    	<input type="hidden" name="userid" value="<?php echo $userid;?>"/> 
    	<input type="hidden" name="story_id" value="<?php echo $row['id'];?>"/>  
   		<span><input type="submit" name="good" value="点&nbsp;&nbsp;赞" class="good"/>
        <?php
		$sql="select good from story where id=$id";
		$rs=mysqli_query($conn,$sql);
		$rows=mysqli_fetch_assoc($rs);
        ?>
        <em><?php echo $row['good'] ;?></em>
        </span>
    </form>

  	<form action="collect_save.php" method="post">
    	<input type="hidden" name="userid" value="<?php echo $userid;?>"/> 
    	<input type="hidden" name="story_id" value="<?php echo $row['id'];?>"/>  
  		<span><input type="submit" name="collect" value="收&nbsp;&nbsp;藏" class="good"/>
        <?php
		$sql="select collect from story where id=$id";
		$rs=mysqli_query($conn,$sql);
		$rows=mysqli_fetch_assoc($rs);
        ?>
        <em><?php echo $row['collect'];?></em>
        </span>
    </form>

    <table cellspacing="5" >
<?PHP
$sql="select c.*,u.username from comments c,user u where c.story_id=$id and c.user_id=u.id order by intime";
$rs=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($rs)){
echo'      <tr>';
echo'        <td class="time">'.date('Y-m-d',strtotime($row['intime'])).'</td>';
echo'        <td class="time">'.$row['username'].':</td>';
echo'        <td>'.$row['content'].'</td>';
echo'      </tr>';
}
?>
   </table>
</div>
