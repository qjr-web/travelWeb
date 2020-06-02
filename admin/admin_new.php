<?php
include('./header.php');
?>
        <div class="mainbox">
            <div class="note">
            	<h4>新增管理员</h4>
                <form action="./admin_new_save.php" method="post" enctype="multipart/form-data">
                	<table cellspacing="0" class="news_form">
                    	<tr>
                        	<td>用户名：</td>
                            <td><input type="text" name="adname" class="inbox"/></td>
                        </tr>
                    	<tr>
                        	<td>密码：</td>
                            <td><input type="password" name="password" class="inbox" /></td>
                        </tr>
                        	<td></td>
                            <td><input type="submit" value="提交"/></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>    
