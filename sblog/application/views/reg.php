<meta charset="utf-8">
<base href="<?php echo site_url();?>">
<form action="user/do_reg" method="post">
	用户名:<input type="text" name="username" id="u1"><br />
	密码:<input type="password" name="pass" id="p1"><br />
	确认密码:<input type="password" name="rpass" id="p2"><br />
	<input type="submit" name="sub" value="注册">
</form>


<script src="assets/js/jquery-1.12.4.min.js"></script>
<script>
	$('#p2').blur(function(){
		var pval=$('#p2').val();
		var pnval=$('#p1').val();
		if(pval!=pnval){
			$(this).after("<span>密码不相同</span>");
		}
	});
</script>
<script>
	$('#u1').blur(function(){
		var value=$(this).val();
		//console.log(value);
		$.post('user/checkname',"uname="+value,function(data){
			var dataobj=JSON.parse(data);
			console.log(typeof(dataobj));
			/*
			if(data=='success'){
				$('#u1').after("<span>用户名重名</span>");			
			}*/
		},'text');
	});
</script>