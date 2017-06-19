<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>root >_Login Administrator Area Web MTs</title>
<script type="text/javascript" src="<?php echo base_url(); ?>aset/jquery.js"></script>
<style type="text/css">
	body { background: #000; font-family: courier; color: #fff; font-size: 14px }
	form input { background: #000; font-family: courier; color: #fff; border: none}
</style>
</head>

<body>
	<div style="margin: 100px auto; width: 500px">
	<form action="<?php echo base_url(); ?>adm/login_process" method="post">
	>_Login to access control panel<br><br><br>
	Enter username : <input type="text" name="username" autofocus required id="username"><br>
	Enter password : <input type="password" name="password" required id="password"><br> 
	<input type="submit" value="Click here to login" style="margin-left: -7px">
	</form>
	<?php echo $this->session->flashdata("k"); ?>
	</div>
</body>
<script type="text/javascript">
$(document).ready(function(){
	   
});
</script>

</html>