<?php
include('./header.php');
?>
        <div class="mainbox">
        	<div class="note">
            	<h4>分类列表</h4>
                <table cellspacing="0" class="=news_list">
					<thead>
						<tr>
							<th>ID</th>
							<th>分类名</th>
							<th>所属板块</th>
							<th>排序号</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$sql="select * from category order by orderno asc,id desc";
						$rs=mysqli_query($conn,$sql);
						while($row=mysqli_fetch_assoc($rs)){
							echo'<tr>';
							echo'<td>'.$row['id'].'</td>';
							echo'<td>'.$row['catename'].'</td>';
							echo'<td>'.$row['module'].'</td>';
							echo'<td>'.$row['orderno'].'</td>';
							echo'<td>';
							echo'<a href="cate_edit.php?id='.$row['id'].'">修改</a>/';
							echo'<a href="cate_delete.php?id='.$row['id'].'" onclick="return confirm(\'你确定要删除该数据吗？\')">删除</a>';
							//onclick="return confirm(\'你确定要删除该数据吗？\')"是js代码，当点删除按钮是，弹出提示框，点确定才删除，取消则不删除。其中\是转义符
							echo'</td>';
							echo'</tr>';
						}
						?>
					</tbody>
				</table>
            </div>
        </div>    
