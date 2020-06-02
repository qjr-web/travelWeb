<?php
include('./header.php');
$id=$_GET['id'];
//构造SQL语句
$sql="select*from story where id=$id";
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
            	<h4>修改故事</h4>
				<!-----
				客户端上传图片的三大前提：
				第一、必须要form的post方式提交
				第二、输入框必须是type="file"类型
				第三、form必须设置为多格式数据上传enctype="multipart/form-data"
				------>
                <form action="./method_edit_save.php" method="post" enctype="multipart/form-data">
                	<input type="hidden" name="id" value="<?php echo $id ;?>"/>
					<table cellspacing="0" class="news_form">
                    	<tr>
                        	<td>故事标题：</td>
                            <td><input type="text" name="title" class="inbox" value="<?php echo $row['title'];?>"/></td>
                        </tr>
                    	<tr>
                        	<td>故事分类：</td>
                            <td>
							<!---
							要实现修改攻略时显示老的攻略分类，分两步实现：
							1、将攻略分类数据显示出来
							2、把攻略原来的分类设置为select下拉框的默认值
							--->
								<select name="cate_id" class="inbox">
									<?php 
									$sql="select * from category where module='旅游攻略' order by orderno asc,id desc";
									$temp=mysqli_query($conn,$sql);
									while($trow=mysqli_fetch_assoc($temp)){
										if($row['cate_id']==$trow['id']){
											//是当前攻略分类
										echo'<option value="'.$trow['id'].'" selected="selected">'.$trow['catename'].'</option>';
										}
										echo'<option value="'.$trow['id'].'">'.$trow['catename'].'</option>';
									}
									?>
								</select>
							</td>
                        </tr>
                    	<tr>
                        	<td>作者：</td>
                            <td><input type="text" name="author" class="inbox" value="<?php echo $row['author'];?>"/></td>
                        </tr>
                    	<tr>
                        	<td>故事内容：</td>
                            <td>
                                <textarea id="editor_id" name="content" cols="100" rows="20" ><?php echo $row['content'];?></textarea>
							</td>
                        </tr>
                    	<tr>
                        	<td>产品图片：</td>
                            <td>
								<img src="../files/<?php echo $row['img'];?>" width="200"/><br/>
								<input type="file" name="img" class="inbox"/>
								<input type="hidden" name="old_img" value="<?php echo $row['img'];?>"/>
							</td>
                        </tr>
                        	<td></td>
                            <td><input type="submit" value="提交"/></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
<?php
include('./bottom.php');
?>
