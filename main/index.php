<?php
include('./top.php');
?>
<script language="javascript" type="text/jscript">	
var imglist=new Array(3)//图片个数
imglist[0]="../img/gg.png"; //第一个图片的地址
imglist[1]="../img/gx.png";
imglist[2]="../img/js.png";
var i=0;
function changeimg()
{
if(i==imglist.length)
{
i=0;
}
document.getElementById("tp").src=imglist[i];
++i;
}
window.setInterval(changeimg,3000)//1000等于1秒

</script>
<div class="banner">
	<img class="tupian" id="tp" src="../img/gg.png"/>
</div> 	

<div class="middle">
	<div class="box1">
    	<h1>->故事推荐<-</h1>
        
        	<?php
			$sql="select * from story order by hits desc, good desc limit 0,2";
			$rs=mysqli_query($conn,$sql);
			while($row=mysqli_fetch_assoc($rs)){
			echo'<div class="story" style="margin-left:10px;">';	
        	echo'<div class="mleft">';
            echo'    <span><a href="story_show.php?id='.$row['id'].'"><img src="../files/'.$row['img'].'"  class="img1"/ ></a></span>';
            echo'</div>';
        	echo'<div class="mright">';
            echo'	<h2><a href="story_show.php?id='.$row['id'].'">'.$row['title'].'</a></h2>';
            echo'    <p><a href="story_show.php?id='.$row['id'].'">'.mb_substr(strip_tags($row['content']),0,100,'utf-8').'...</p>';
            echo'    <span>查看全文>></span>';
            echo'</div>';
            echo'</div>';
			}
            ?>
        	<?php
			$sql="select * from story order by hits desc, good desc limit 2,2";
			$rs=mysqli_query($conn,$sql);
			while($row=mysqli_fetch_assoc($rs)){
			echo'<div class="story" style="margin-left:10px;">';	
        	echo'<div class="mright">';
            echo'	<h2><a href="story_show.php?id='.$row['id'].'">'.$row['title'].'</a></h2>';
            echo'    <p><a href="story_show.php?id='.$row['id'].'">'.mb_substr(strip_tags($row['content']),0,100,'utf-8').'...</p>';
            echo'    <span>查看全文>></span>';
            echo'</div>';
        	echo'<div class="mleft">';
            echo'    <span><a href="story_show.php?id='.$row['id'].'"><img src="../files/'.$row['img'].'"  class="img1"/ ></a></span>';
            echo'</div>';
            echo'</div>';
			}
            ?>
        
        
    </div>
  <div class="box1">
    <h1>->最近更新<-</h1>
      <table width="100%" border="0" align="left" cellpadding="6" cellspacing="10">
  <tr>
    <td width="22%" align="left" bgcolor="#FFD6C1">标题</td>
    <td width="48%" align="left" bgcolor="#FFD6C1">内容</td>
    <td width="15%" align="center" bgcolor="#FFD6C1">作者</td>
    <td width="15%" align="center" bgcolor="#FFD6C1">时间</td>
    </tr>
  	<?php
	$sql="select*from story order by intime desc limit 0,10";
	$rs=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_assoc($rs)){
	echo'<tr>';
    echo'<td align="left"><a href="story_show.php?id='.$row['id'].'">'.$row['title'].'</a></td>';
    echo'<td align="left"><a href="story_show.php?id='.$row['id'].'">'.mb_substr(strip_tags($row['content']),0,40,'utf-8').'……</a></td>';
    echo'<td align="center"><a href="story_show.php?id='.$row['id'].'">'.$row['author'].'</a></td>';
    echo'<td align="center"><a href="story_show.php?id='.$row['id'].'">'.date('Y-m-d',strtotime($row['intime'])).'</a></td>';
	echo'</tr>';
	}
    ?>
        </table>
    </div>
</div>
<?php
include('./bottom.php');
?>




























