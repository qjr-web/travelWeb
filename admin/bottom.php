
<script charset="utf-8" src="../editor/kindeditor.js"></script>
<script charset="utf-8" src="../editor/lang/zh-CN.js"></script>
<script>
        KindEditor.ready(function(K) {
                window.editor = K.create('#editor_id');
        });
		var options = {
        cssPath : '/css/index.css',
        filterMode : true
};
		var editor = K.create('textarea[name="content"]', options);
		
		// 同步数据后可以直接取得textarea的value
editor.sync();
html = document.getElementById('editor_id').value; // 原生API
html = K('#editor_id').val(); // KindEditor Node API
html = $('#editor_id').val(); // jQuery

// 设置HTML内容
editor.html('HTML内容');
</script>   
</body>
</html>

