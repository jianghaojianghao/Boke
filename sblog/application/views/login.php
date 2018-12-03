<meta charset="utf-8">
<base href="<?php echo site_url();?>">
<form action="user/do_login" method="post">
	<input type="hidden" name="hstr" value="<?php echo $str?>">
	用户名:<input type="text" name="username"><br />
	密码:<input type="password" name="pass"><br />
	<input type="submit" name="sub" value="登录">
</form>
