<?php
include('./header.php');
?>
        <div class="mainbox">
            <div class="note">
            	<h4>新增友情链接</h4>
                <form action="./flink_new_save.php" method="post" enctype="multipart/form-data">
                	<table class="news_form">
                    	<tr>
                        	<td>链接名称：</td>
                            <td><input type="text" name="title" class="inbox"/></td>
                        </tr>
                    	<tr>
                        	<td>连接地址：</td>
                            <td><input type="text" name="link_url" class="inbox"/></td>
                        </tr>
                    	<tr>
                        	<td>描述：</td>
                            <td><textarea name="content" cols="60" rows="6"></textarea></td>
                        </tr>
                        	<td></td>
                            <td><input type="submit" value="提交"/></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>    