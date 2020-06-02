<?php
error_reporting(0);
include('./top.php');
$username=$_SESSION['username'];
$userid=$_SESSION['userid'];

?>
<link rel="stylesheet" href="../css/p_personal.css" />
<div class="pbox">
  <div class="pnew">
    	<h2><span>亲爱的<?php echo $_SESSION['username'];?>，快来查看你的新消息吧……</span></h2>
    	<div class="information">
        	<table width="800"  cellspacing="1">
        <?php
		$pagesize=10;
		if(isset($_GET['page'])){
			$page=$_GET['page'];
		}
		else {
			$page=1;
		}
		$sql="select c.*,s.title,u.username from story s,comments c,user u where  c.user_id=u.id and c.story_id=s.id and s.author='$username'";
		$rs=mysqli_query($conn,$sql);
		$reconds=mysqli_num_rows($rs);
		$start=($page-1)*$pagesize;
		$sql="select c.*,s.title,u.username from story s,comments c,user u where  c.user_id=u.id and c.story_id=s.id and s.author='$username' order by intime desc limit $start,$pagesize";
		$rs=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_assoc($rs)){
		echo'<tr>';
		echo'   <td width="700px;">'.date('Y-m-d',strtotime($row['intime'])).''.$row['username'].'评论你的《'.$row['title'].'》：'.$row['content'].'</td>';
		echo' <td width="100px;"><a href="comments_reply.php?id='.$row['id'].'">回复</a>/<a href="comments_delete.php?id='.$row['id'].'" onclick="return confirm(\'你确定要删除该数据吗？\')">删除</a></td>';
		echo'</tr>';
		}
	?>
            </table>
        <div class="page">
        <?php
        $pagecount=ceil($reconds/$pagesize);
		for($i=1;$i<=$pagecount;$i++){
			if($page==$i){
				echo"<a href='p_personal.php?page=$i' class='on'>$i</a>";
			}else{
				echo"<a href='p_personal.php?page=$i'>$i</a>";
			}
		}
		?>
        </div>
            
            
    	</div>
<h3>分享我的故事</h3>
<p>旅游不在乎终点，而是在旅途中的人和事还有那些美好的记忆和景色……</p>

        <!---enctype="multipart/form-data"声明表单数据有多部分构成，既有文本数据，又有文件等二进制数据-->
    	<form action="story_save.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="username" value="<?php echo $username ;?>"/>
        <input type="hidden" name="userid" value="<?php echo $userid;?>"/>
    	  <table width="800" height="30px" border="1" bordercolor="#FFBE9F"s cellspacing="0" cellpadding="1">
    	    <tr>
    	      <td class="newtitle">文章标题：</td>
    	      <td class="newcontent"><input type="text" name="title"  class="inbox"/></td>
  	      </tr>
    	    <tr>
    	      <td class="newtitle">请选择分类模块：</td>
    	      <td class="newcontent">
              	<select class="inbox" name="cate_id">
                    <?php
					$sql="select * from category order by orderno asc";
					$temp=mysqli_query($conn,$sql);
					while($trow=mysqli_fetch_assoc($temp)){
						echo'<option value="'.$trow['id'].'">'.$trow['catename'].'</option>';
					}
                    ?>
              	</select>
              </td>
  	      </tr>
    	    <tr>
    	      <td class="newtitle">文章内容：</td>
    	      <!---<td class="newcontent"><textarea name="content" cols="100" rows="20" ></textarea></td>-->
               <td class="newcontent"><textarea id="editor_id" name="content" cols="100" rows="20" ></textarea></td>
  	      </tr>
    	   <tr>
    	      <td class="newtitle">主图：</td>
    	      <td class="newcontent"><input type="file" name="img" class="inbox"/></td>
  	      </tr>
    	    <tr>
    	      <td class="newtitle"></td>
    	      <td class="newcontent"><input type="submit" value="发布" /></td>
  	      </tr>
          
  	    </table>
        </form>
    </div>
    <div class="pold">
    	<div class="pcollect">
         	<p>我的收藏</p>
        	<ul>
    	
        <?php
		$pagesize=8;
		if(isset($_GET['page'])){
			$page=$_GET['page'];
		}
		else {
			$page=1;
		}
		$sql="select s.title from story s,collect c where  c.user_id=$userid and c.story_id=s.id";
		$rs=mysqli_query($conn,$sql);
		$reconds=mysqli_num_rows($rs);
		$start=($page-1)*$pagesize;
		$sql="select s.* from story s,collect c where c.story_id=s.id and c.user_id=$userid order by intime desc limit $start,$pagesize";
		$rs=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_assoc($rs)){
		echo'    <li><a href="story_show.php?id='.$row['id'].'">'.$row['title'].'</a></li>';
		}
	?>
         	</ul>
        <div class="page">
        <?php
        $pagecount=ceil($reconds/$pagesize);
		for($i=1;$i<=$pagecount;$i++){
			if($page==$i){
				echo"<a href='p_personal.php?page=$i' class='on'>$i</a>";
			}else{
				echo"<a href='p_personal.php?page=$i'>$i</a>";
			}
		}
		?>
        </div>
        </div>
        
        
    	<div class="pcollect">
         	<p>我发布的故事</p>
        	<ul>
        <?php
		$pagesize=8;
		if(isset($_GET['page'])){
			$page=$_GET['page'];
		}
		else {
			$page=1;
		}
		$sql="select * from story where story.author='$username'";
		$rs=mysqli_query($conn,$sql);
		$reconds=mysqli_num_rows($rs);
		$start=($page-1)*$pagesize;
		$sql="select * from story where story.author='$username' order by intime desc limit $start,$pagesize";
		$rs=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_assoc($rs)){
		echo'    <li><a href="story_show.php?id='.$row['id'].'">'.$row['title'].'</a></li>';
		}
	?>
         	</ul>
        <div class="page">
        <?php
        $pagecount=ceil($reconds/$pagesize);
		for($i=1;$i<=$pagecount;$i++){
			if($page==$i){
				echo"<a href='p_personal.php?page=$i' class='on'>$i</a>";
			}else{
				echo"<a href='p_personal.php?page=$i'>$i</a>";
			}
		}
		?>
        </div>
        </div>
    </div>
</div>
<?php
include('./bottom.php');
?>