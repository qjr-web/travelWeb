<?php
include('./header.php');
?>
        <div class="mainbox">
            <div class="note">
            	<h4>新增分类</h4>
                <form action="./cate_new_save.php" method="post" enctype="multipart/form-data">
                	<table cellspacing="0" class="news_form">
                    	<tr>
                        	<td>分类名：</td>
                            <td><input type="text" name="catename" class="inbox"/></td>
                        </tr>
                    	<tr>
                        	<td>所属板块：</td>
                            <td>
								<select name="module" class="inbox">
									<option value="旅游故事">旅游故事</option>
									<option value="旅游攻略">旅游攻略</option>
								</select>
							</td>
                        </tr>
                    	<tr>
                        	<td>排序号：</td>
                            <td><input type="text" name="orderno" class="inbox" value="1"/></td>
                        </tr>
                        	<td></td>
                            <td><input type="submit" value="提交"/></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>    
