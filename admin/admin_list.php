<?php
include('./header.php');
?>
        <div class="mainbox">
        	<div class="note">
            	<h4>管理员列表</h4>
                <table cellspacing="0" class="=news_list">
					<thead>
						<tr>
							<th>ID</th>
							<th>用户名</th>
							<th>密码</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$sql="select * from admin order by id asc";
						$rs=mysqli_query($conn,$sql);
						while($row=mysqli_fetch_assoc($rs)){
							echo'<tr>';
							echo'<td>'.$row['id'].'</td>';
							echo'<td>'.$row['adname'].'</td>';
							echo'<td>'.$row['password'].'</td>';
							echo'<td>';
							echo'<a href="admin_edit.php?id='.$row['id'].'">修改</a>/';
							echo'<a href="admin_delete.php?id='.$row['id'].'" onclick="return confirm(\'你确定要删除该数据吗？\')">删除</a>';
							//onclick="return confirm(\'你确定要删除该数据吗？\')"是js代码，当点删除按钮是，弹出提示框，点确定才删除，取消则不删除。其中\是转义符
							echo'</td>';
							echo'</tr>';
						}
						?>
					</tbody>
				</table>
            </div>
        </div>    
