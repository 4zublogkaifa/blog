<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>博客注册</title>

<link rel="stylesheet" type="text/css" href="/dl/css/style.css">
	<script src="/layui/layui.js"></script>
	<link rel="stylesheet" href="/layui/css/layui.css">
<script type="text/javascript" src="/dl/js/jquery.min.js"></script>
<script type="text/javascript" src="/dl/js/vector.js"></script>

</head>
<body>

<div id="container">
	<div id="output">
		<div class="containerT">
			<h1>用户注册</h1>
			<form class="form" id="entry_form">
				<input type="text" placeholder="用户名" id="usr_name">
				<input type="password" placeholder="密码" id="usr_pwd">
				<button type="button" id="entry_btn">注册</button>
				<div id="prompt" class="prompt"></div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
    $(function(){
        Victor("container", "output");   //登陆背景函数
        $("#entry_name").focus();
        $(document).keydown(function(event){
            if(event.keyCode==13){
                $("#entry_btn").click();
            }
        });
    });
</script>

</body>
</html>
<script>
	$(function(){
		layui.use(['layer'],function(){
			$('#entry_btn').click(function(){
				var data = {};
				var usr_name = $('#usr_name').val();
				var usr_pwd = $('#usr_pwd').val();
				data.usr_name = usr_name;
				data.usr_pwd = usr_pwd;
				$.ajax({
					Type:'POST',
					data:data,
					url:'/registeradd',
					success:function (msg) {
						if(msg.status==0){
							layer.msg(msg.msg);
						}else{
							layer.msg(msg.msg);
							location.href="/index/register";
						}
					}
				});
			})
		})
	})
</script>
