<?php
include('./header.php');
?>
        <div class="mainbox">
        	<div class="note">
            	<h4>旅游故事列表</h4>
                <table cellspacing="0" class="=news_list">
					<thead>
						<tr>
							<th>ID</th>
							<th>标题</th>
							<th>分类</th>
							<th>作者</th>
							<th>日期</th>
							<th>点击率</th>
							<th>点赞数</th>
							<th>收藏数</th>
							<th>评论数</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						<?php
						
						//分页步骤一、集齐三大条件
						//条件一：每页条数，自己设置
						$pagesize=10;
						//条件二：当前是第几页，这个条件由用户决定，所以通过get传参。用户没选择默认第一页
						if(isset($_GET['page'])){
							$page=$_GET['page'];
						}
						else{
							$page=1;
						}
						//条件三：总条数，从数据库中读取
						$sql="select * from story ";
						$rs=mysqli_query($conn,$sql);
						$reconds=mysqli_num_rows($rs);//mysqli_num_rows($rs)的作用是获取结果集中的总条数
						
						//步骤二：当前页显示的那些数据？
						$start=($page-1)*$pagesize;
						$sql="select s.*,c.catename from story s,category c where s.cate_id=c.id order by intime limit $start,$pagesize";
						$rs=mysqli_query($conn,$sql);
						while($row=mysqli_fetch_assoc($rs)){
							echo'<tr>';
							echo'<td>'.$row['id'].'</td>';
							echo'<td>'.$row['title'].'</td>';
							echo'<td>'.$row['catename'].'</td>';
							echo'<td>'.$row['author'].'</td>';
							echo'<td>'.date('Y-m-d',strtotime($row['intime'])).'</td>';
							echo'<td>'.$row['hits'].'次</td>';
							echo'<td>'.$row['good'].'</td>';
							echo'<td>'.$row['collect'].'</td>';
							echo'<td>'.$row['comment'].'</td>';
							echo'<td>';
							echo'<a href="story_edit.php?id='.$row['id'].'">修改</a>/';
							echo'<a href="story_delete.php?id='.$row['id'].'" onclick="return confirm(\'你确定要删除该数据吗？\')">删除</a>';
							//onclick="return confirm(\'你确定要删除该数据吗？\')"是js代码，当点删除按钮是，弹出提示框，点确定才删除，取消则不删除。其中\是转义符
							echo'</td>';
							echo'</tr>';
						}
						?>
					</tbody>
                </table>
                <div class="page">
					<?php
					//分页步骤三：打印分页表
					//要打印分页表必须计算出总页数：总页数=向上取整ceil（总条数/每页显示的条数）
					$pagecount=ceil($reconds/$pagesize);//ceil()是向上取整的函数
					for($i=1 ;$i<=$pagecount ;$i++){
						if($page==$i){
							echo"<a href='index.php?page=$i' class='on'>$i</a>";//给当前页的页码加上样式
						}else{
							echo"<a href='index.php?page=$i'>$i</a>";
						}
					}
					?>
                </div>
            </div>
        </div>        
</body>
</html>