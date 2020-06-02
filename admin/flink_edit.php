<?php
include('./header.php');
$id=$_GET['id'];
//构造SQL语句
$sql="select*from flink where id=$id";
$rs=mysqli_query($conn,$sql);
//判断是否有数据，如果没有查到数据就中断执行，有数据就提取
if(mysqli_num_rows($rs)){
	$row=mysqli_fetch_assoc($rs);//从结果集中提取一行数据，以关联数组的形式返回给变量
}
else{
	echo'没有数据！';exit;
}
mysqli_free_result($rs);//释放结果集
?>
        <div class="mainbox">
            <div class="note">
            	<h4>修改连接</h4>
                <form action="./flink_edit_save.php" method="post">
                	<input type="hidden" name="id" value="<?php echo $id ;?>"/><!---隐藏的id用来作为后面修改的条件--->
					<table cellspacing="0" class="news_form">
                    	<tr>
							<td>连接名：</td>
                            <td><input type="text" name="title" class="inbox" value="<?php echo $row['title'];?>"/></td>
                        </tr>
                    	<tr>
							<td>连接网址：</td>
                            <td><input type="text" name="link_url" class="inbox" value="<?php echo $row['link_url'];?>"/></td>
                        </tr>
                    	<tr>
                        	<td>描述：</td>
                            <td><textarea name="content" cols="60" rows="6"><?php echo $row['content'];?></textarea></td>
                        </tr>
                    	<tr>
                        	<td></td>
                            <td><input type="submit" value="提交"/></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>    
