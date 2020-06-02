<?php
include('./header.php');
?>
        <div class="mainbox">
        	<div class="note">
            	<h4>友情链接列表</h4>
                <table cellspacing="0" class="=news_list">
					<thead>
						<tr>
							<th>ID</th>
							<th>连接名称</th>
							<th>连接地址</th>
							<th>描述</th>
							<th>时间</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$sql="select * from flink order by intime";
						$rs=mysqli_query($conn,$sql);
						while($row=mysqli_fetch_assoc($rs)){
							echo'<tr>';
							echo'<td>'.$row['id'].'</td>';
							echo'<td>'.$row['title'].'</td>';
							echo'<td>'.$row['link_url'].'</td>';
							echo'<td>'.$row['content'].'</td>';
							echo'<td>'.date('Y-m-d',strtotime($row['intime'])).'</td>';
							echo'<td>';
							echo'<a href="flink_edit.php?id='.$row['id'].'">修改</a>/';
							echo'<a href="flink_delete.php?id='.$row['id'].'" onclick="return confirm(\'你确定要删除该数据吗？\')">删除</a>';
							//onclick="return confirm(\'你确定要删除该数据吗？\')"是js代码，当点删除按钮是，弹出提示框，点确定才删除，取消则不删除。其中\是转义符
							echo'</td>';
							echo'</tr>';
						}
						?>
					</tbody>
				</table>
            </div>
        </div>    
