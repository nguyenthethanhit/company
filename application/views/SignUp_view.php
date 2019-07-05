<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<script type="text/javascript" src="<?php echo base_url()?>vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="<?php echo base_url()?>1.js"></script>
	<link rel="stylesheet" href="<?php echo base_url()?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url()?>vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?php echo base_url()?>1.css">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>
<script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/md5.js"></script>

<script>
function encrypt()
{
	var username = document.getElementById('username').value;
	var ten = document.getElementById('ten').value;
	var sdt = document.getElementById('sdt').value;
	var diachi = document.getElementById('diachi').value;
	var email = document.getElementById('email').value;
	var pass=document.getElementById('pwd').value;
	if(username =="" ||ten =="" || sdt =="" ||diachi == "" || email == "" || pass =="")
	{
		document.getElementById('err').innerHTML='Chưa nhập đầy đủ thông tin';
		return false;
	}

	else
	{
	var hash = CryptoJS.MD5(pass);
	document.getElementById('password').value=hash;
	return true;
	}
}
</script>


	<title>Đăng kí</title>
</head>
<body>
	<?php  
		if($this->session->userdata('user')=='thanhdeptrai')
		{
			require('header_admin.php');
		}
	?>


	<div class="container">
		<h3 class="text-xs-center">Đăng kí</h3>
		<hr>
		<div class="card-block">
			<form action="../Ctl/SignUp" method="post" >
		<div class="card">
			<div class="card-block">
				<div class="container">
			<fieldset class="form-group">
			<label for="username">Username:</label>
			<input type="text" name="username" class="form-control" id="username">
			</fieldset>

		<fieldset class="form-group">
			<label for="pwd">Password:</label>
			<input type="password" class="form-control" id="pwd">
			<input type="hidden" name="password" id="password">
		</fieldset>

		<fieldset class="form-group">
			<label for="ten">Tên:</label>
			<input type="text" name="ten" class="form-control" id="ten">
		</fieldset>

		<fieldset class="form-group">
			<label for="sdt">Số điện thoại:</label>
			<input type="text" name="sdt" class="form-control" id="sdt">
		</fieldset>

		<fieldset class="form-group">
			<label for="diachi">Địa chỉ:</label>
			<input type="text" name="diachi" class="form-control" id="diachi">
		</fieldset>

		<fieldset class="form-group">
			<label for="email">Email:</label>
			<input type="email" name="email" class="form-control" id="email">
			
		</fieldset>

		<button type="submit" class="btn btn-success" onclick="return encrypt()">Đăng kí</button>
		<div style="color:red" id="errSignUp"><?php echo $this->session->flashdata("errSignUp");?></div>
		
		</div>
			</div>
		</div>
	</form>
		</div>
	</div>
	<?php require('footer.php'); ?>
	

</body>
</html>