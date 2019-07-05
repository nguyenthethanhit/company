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
var oldpass1=document.getElementById('oldpass1').value;
var newpass1=document.getElementById('newpass1').value;
var newpass2 = document.getElementById('newpass3').value
if(newpass1 != newpass2)
{
	document.getElementById('err').innerHTML='Mật khẩu nhập lại phải chính xác';
	return false;
}
if(oldpass1=="" || newpass1 == "")
{
document.getElementById('err').innerHTML='Chưa nhập đầy đủ thông tin';
return false;
}
else
{
var hash1 = CryptoJS.MD5(oldpass1);
var hash2 = CryptoJS.MD5(newpass1);
document.getElementById('oldpass2').value=hash1;
document.getElementById('newpass2').value=hash2;

return true;
}
}
</script>


	<title>Đổi mật khẩu</title>
</head>
<body>
	<?php  
		if($this->session->has_userdata('user') && $this->session->userdata('user') != 'thanhdeptrai')
		{
			require('header_user.php');
		}
		elseif ($this->session->has_userdata('user') && $this->session->userdata('user') == 'thanhdeptrai') 
		{
			require('header_admin.php');
		}
	?>
	

	<div class="contain">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="text-xs-center">Đổi mật khẩu</h3>
				<hr>
			</div>
		</div>
		
		<div class="card-block">

			<form action="../Ctl/ChangePass" method="post" >
		<div class="card">
			<div class="card-block">
				<div class="container">
			<fieldset class="form-group">
			<label for="oldpass1">Mật khẩu hiện tại:</label>
			<input type="password" name="oldpass1" class="form-control" id="oldpass1">
			<input type="hidden" name="oldpass2" id='oldpass2'>


			</fieldset>

		<fieldset class="form-group">
			<label for="newpass1">Mật khẩu mới:</label>
			<input type="password" class="form-control" id="newpass1">
			<input type="hidden" name="newpass2" id='newpass2'>
		</fieldset>

		<fieldset class="form-group">
			<label for="newpass3">Nhập lại mật khẩu:</label>
			<input type="password" class="form-control" id="newpass3">
		</fieldset>

		</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-lg-5"></div>
				<div class="col-lg-4">
					<button type="submit" class="btn btn-success" onclick="return encrypt()">Đổi mật khẩu</button>
					<div style="color:red" id="err"><?php echo $this->session->flashdata("err")?></div>
				</div>
				<div class="col-lg-3"></div>
				
			</div>
		</div>
		
	</form>

		</div>
	</div>
	
	<?php require('footer.php'); ?>
	

</body>
</html>