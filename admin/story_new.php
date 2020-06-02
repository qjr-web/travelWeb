<?php
include('./header.php');
?>
        <div class="mainbox">
            <div class="note">
            	<h4>发布故事：</h4>
                <form action="./story_new_save.php" method="post" enctype="multipart/form-data">
                	<table cellspacing="0" class="news_form">
                    	<tr>
                        	<td>文章标题：</td>
                            <td><input type="text" name="title" class="inbox"/></td>
                        </tr>
                    	<tr>
                        	<td>文章分类：</td>
                            <td>
								<select name="cate_id" class="inbox">
									<option value="0">请选择故事分类</option>
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
                        	<td>文章作者：</td>
                            <td><input type="text" name="author" class="inbox"/></td>
                        </tr>
                    	<tr>
                        	<td>文章内容：</td>
                            <td>
								<textarea id="editor_id" name="content" cols="100" rows="20" ></textarea>
							</td>
                        </tr>
                    	<tr>
                        	<td>上传图片：</td>
                            <td><input type="file" name="img" class="inbox"/></td>
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
