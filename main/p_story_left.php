<link rel="stylesheet" href="../css/p_story.css" />
<div class="sbox">
	<div class="slbox">
        <?php
		$pagesize=5;
		if(isset($_GET['page'])){
			$page=$_GET['page'];
		}
		else {
			$page=1;
		}
		$sql="select s.* from story s,category c where s.cate_id=c.id and c.orderno>=50 ";
		$rs=mysqli_query($conn,$sql);
		$reconds=mysqli_num_rows($rs);
		$start=($page-1)*$pagesize;
		$sql="select s.* from story s,category c where s.cate_id=c.id and c.orderno>=50 order by hits desc,good desc limit $start,$pagesize";
		$rs=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_assoc($rs)){
		echo'		<div class="slist">';
		echo'        	<div class="simg"><a href="story_show.php?id='.$row['id'].'"><img src="../files/'.$row['img'].'" /></a></div>';	
		echo'            <div class="scontent">';	
		echo'            	<h3><a href="story_show.php?id='.$row['id'].'">'.$row['title'].'</a></h3>';	
		echo'                <p><span>作者：'.$row['author'].'</span><span>时间:'.date('Y-m-d',strtotime($row['intime'])).'</span><span>点击量：'.$row['hits'].'</span><span>点赞：'.$row['good'].'</span></p>';	
		echo'                <p><a href="story_show.php?id='.$row['id'].'">&nbsp;&nbsp;'.mb_substr(strip_tags($row['content']),0,100,'utf-8').'...</a></p>';	
		echo'            </div>';	
		echo'        </div>';	
		}
        ?>
        <div class="page">
        <?php
        $pagecount=ceil($reconds/$pagesize);
		for($i=1;$i<=$pagecount;$i++){
			if($page==$i){
				echo"<a href='p_story.php?page=$i' class='on'>$i</a>";
			}else{
				echo"<a href='p_story.php?page=$i'>$i</a>";
			}
		}
		?>
        </div>
	</div>
