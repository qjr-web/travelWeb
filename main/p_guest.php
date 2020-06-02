<?php
error_reporting(E_ALL & ~E_NOTICE);//不让PHP错误警告影响布局
include('./top.php');
$userid=$_SESSION['userid'];

?>
<link rel="stylesheet" href="../css/p_guest.css" />
<div class="gbox">
	<div class="guest">
    	<ul>
        <?php
		$pagesize=10;
		if(isset($_GET['page'])){
			$page=$_GET['page'];
		}
		else {
			$page=1;
		}
		$sql="select * from guestbook ";
		$rs=mysqli_query($conn,$sql);
		$reconds=mysqli_num_rows($rs);
		$start=($page-1)*$pagesize;
		$sql="select g.* ,u.username from guestbook g,user u where g.user_id=u.id order by intime desc limit $start,$pagesize";
		$rs=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_assoc($rs)){
			echo'<li>';
			echo'<em>'.date('Y-m-d',strtotime($row['intime'])).'</em><span>'.$row['username'].'说：'.$row['content'].'</span>';
			echo'</li>';
		}
		?>
        </ul>
        <div class="page">
        <?php
        $pagecount=ceil($reconds/$pagesize);
		for($i=1;$i<=$pagecount;$i++){
			if($page==$i){
				echo"<a href='p_guest.php?page=$i' class='on'>$i</a>";
			}else{
				echo"<a href='p_guest.php?page=$i'>$i</a>";
			}
		}
		?>
        </div>
        
        <div class="newguest">
        	<h2>我要留言</h2>
            <form action="guestbook_save.php" method="post">
            	<input type="hidden" name="userid" value="<?php echo $userid ;?>"/>
                <textarea name="content" cols="80" rows="10" ></textarea> 	
                <input type="submit" value="提交" />
            </form>
        </div>
        
    </div>
    
	<?php
include('./p_story_right.php');
	?>

</div>
<?php
include('./bottom.php');
?>
