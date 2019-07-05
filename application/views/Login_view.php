<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<script type="text/javascript" src="<?php echo base_url()?>vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="<?php echo base_url()?>1.js"></script>
	<link rel="stylesheet" href="<?php echo base_url()?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url()?>vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?php echo base_url()?>1.css">
	

<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>
<script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/md5.js"></script>

<script>
function encrypt()
{
var pass=document.getElementById('pwd').value;
var user=document.getElementById('username').value;
if(pass=="" || user == "")
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


	<title>Login</title>
</head>
<body>

	<div class="contain">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="text-xs-center">Đăng nhập</h3>
				<hr>
			</div>
		</div>
		
		<div class="card-block">

			<form action="Ctl/Login" method="post" >
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
			<input type="hidden" name="password" id='password'>
		</fieldset>

		</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-lg-5"></div>
				<div class="col-lg-4">
					<button type="submit" class="btn btn-success" onclick="return encrypt()">Login</button>
					<a href="<?php echo base_url();?>index.php/ctl/SignUp_view" class="btn btn-info" role="button">Sign Up</a> 
					<div style="color:red" id="err"><?php echo $this->session->flashdata("error")?></div>
				</div>
				<div class="col-lg-3"></div>
				
			</div>
		</div>
		
	</form>

		</div>
	</div>
	<!-- <a href="<?php echo base_url();?>index.php/ctl/SignUp_view" class="btn btn-info" role="button">Sign Up</a> -->
	

</body>
</html>