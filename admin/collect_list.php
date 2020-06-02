<?php
include('./header.php');
?>
        <div class="mainbox">
        	<div class="note">
            	<h4>评论列表</h4>
                <table cellspacing="0" class="=news_list">
					<thead>
						<tr>
							<th>ID</th>
							<th>用户名</th>
							<th>收藏的文章</th>
							<th>收藏时间</th>
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
						$sql="select * from collect";
						$rs=mysqli_query($conn,$sql);
						$reconds=mysqli_num_rows($rs);//mysqli_num_rows($rs)的作用是获取结果集中的总条数
						
						//步骤二：当前页显示的那些数据？
						$start=($page-1)*$pagesize;
						//连表查询，为了让在产品列表显示产品分类名称而不是编号
						$sql="select c.* ,u.username ,s.title from collect c,user u, story s where c.user_id=u.id and c.story_id=s.id order by intime limit $start,$pagesize";
						$rs=mysqli_query($conn,$sql);
						while($row=mysqli_fetch_assoc($rs)){
							echo'<tr>';
							echo'<td>'.$row['id'].'</td>';
							echo'<td>'.$row['username'].'</td>';
							echo'<td>'.$row['title'].'</td>';
							echo'<td>'.date('Y-m-d',strtotime($row['intime'])).'</td>';
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
							echo"<a href='collect_list.php?page=$i' class='on'>$i</a>";//给当前页的页码加上样式
						}else{
							echo"<a href='collect_list.php?page=$i'>$i</a>";
						}
					}
					?>
                </div>
            </div>
        </div>    
