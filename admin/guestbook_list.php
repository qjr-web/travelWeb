<?php
include('./header.php');
?>
        <div class="mainbox">
        	<div class="note">
            	<h4>留言列表</h4>
                <table cellspacing="0" class="=news_list">
					<thead>
						<tr>
							<th>ID</th>
							<th>用户名</th>
							<th>留言内容</th>
							<th>留言时间</th>
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
						$sql="select * from guestbook";
						$rs=mysqli_query($conn,$sql);
						$reconds=mysqli_num_rows($rs);//mysqli_num_rows($rs)的作用是获取结果集中的总条数
						
						//步骤二：当前页显示的那些数据？
						$start=($page-1)*$pagesize;
						//连表查询，为了让在产品列表显示产品分类名称而不是编号
						$sql="select g.* ,u.username from guestbook g,user u  where g.user_id=u.id order by intime limit $start,$pagesize";
						$rs=mysqli_query($conn,$sql);
						while($row=mysqli_fetch_assoc($rs)){
							echo'<tr>';
							echo'<td>'.$row['id'].'</td>';
							echo'<td>'.$row['username'].'</td>';
							echo'<td>'.$row['content'].'</td>';
							echo'<td>'.date('Y-m-d',strtotime($row['intime'])).'</td>';
							echo'<td>';
							echo'<a href="guestbook_delete.php?id='.$row['id'].'" onclick="return confirm(\'你确定要删除该数据吗？\')">删除</a>';
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
							echo"<a href='guestbook_list.php?page=$i' class='on'>$i</a>";//给当前页的页码加上样式
						}else{
							echo"<a href='guestbook_list.php?page=$i'>$i</a>";
						}
					}
					?>
                </div>
            </div>
        </div>    
