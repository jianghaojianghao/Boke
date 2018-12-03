<meta charset="utf-8">
<base href="<?php echo site_url()?>">
<form action="blog/do_add" method="post">
	title:<input type="text" name="title">
	<select name="cata" id="">
		<?php
			foreach($cata as $v){
		?>
		<option value="<?php echo $v->cid?>"><?php echo $v->cname?></option>
		<?php
			}
		?>
	</select>
	<br />
	con:<textarea cols=40 rows=10 name="con"></textarea><br />
	<input type="submit" name="sub" value="添加文章">
</form>