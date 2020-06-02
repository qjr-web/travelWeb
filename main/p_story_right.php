<link rel="stylesheet" href="../css/p_story.css" />
    <div class="srbox">
    	<div class="scategory">
         	<p>更多旅游故事分类</p>
        	<ul>
    <?php
	$sql="select catename,id from category where orderno>=50";
	$rs=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_assoc($rs)){
		echo'    <li><a href="story_list.php?id='.$row['id'].'">'.$row['catename'].'</a></li>';
	}
	?>
         	</ul>
        </div>
    	<div class="scategory">
         	<p>好文排行榜</p>
        	<ul>
    <?php
	$sql="select s.*  from story s,category c  where s.cate_id=c.id and c.orderno>=50 order by good desc limit 5";
	$rs=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_assoc($rs)){
		echo'   <li><a href="story_show.php?id='.$row['id'].'">'.$row['title'].'</a></li>';
	}
	?>
         	</ul>
        </div>
    	<div class="scategory">
         	<p>友情链接</p>
        	<ul>
    <?php
	$sql="select *  from flink order by intime desc limit 10";
	$rs=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_assoc($rs)){
		echo'   <li><a href="'.$row['link_url'].'">'.$row['title'].'</a></li>';
	}
	?>
         	</ul>
        </div>
    </div>
</div>
