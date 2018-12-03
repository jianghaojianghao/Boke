<meta charset="utf-8">
<base href="<?php echo site_url();?>">
<a href="blog/add">添加文章</a>
<?php
	if($this->session->userdata('uid')){
		echo $this->session->userdata('uname')." 已登录 "."<a href='user/ulogin'>注销</a>";
	}else{
		echo "<a href='user/login'>未登录</a>";
	} 
	
?>

<?php
	foreach($blogs as $v){
?>
<h3>标题:<?php echo $v->title?></h3>
<li>日期:<?php echo $v->ntime?></li>
<li>作者:<?php echo $v->uname?></li>
<p>内容:<?php echo $v->content?></p>
<hr>
<?php
	}
?>