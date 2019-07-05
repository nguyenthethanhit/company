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


	<title>Update Infomation</title>
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

	
	<?php foreach ($dulieu as $key => $value): ?>
		
	

	<div class="container">
		<h3 class="text-xs-center">Update Infomation</h3>
		<hr>
		<div class="card-block">
			<form action="<?php echo base_url()?>index.php/Ctl/UpdateInfo_admin" method="post" >
		<div class="card">
			<div class="card-block">
				<div class="container">
		<fieldset class="form-group">
			<!-- <label for="username">Username:</label> -->
			<input type="hidden" name="id" class="form-control" id="id"  value="<?php echo $value['id'];?>">
			</fieldset>
			
			<fieldset class="form-group">
			<label for="username">Username:</label>
			<input type="text" class="form-control" name="username" id="username" value="<?php echo $value['username'];?>">
			</fieldset>

			<fieldset class="form-group">
			<input type="hidden" name="user" class="form-control" value="<?php echo $value['username'];?>">
			</fieldset>

		<fieldset class="form-group">
			<label for="ten">Tên:</label>
			<input type="text" name="ten" class="form-control" id="ten" value="<?php echo $value['ten'];?>">
		</fieldset>

		<fieldset class="form-group">
			<label for="sdt">Số điện thoại:</label>
			<input type="text" name="sdt" class="form-control" id="sdt" value="<?php echo $value['sdt'];?>">
		</fieldset>

		<fieldset class="form-group">
			<label for="diachi">Địa chỉ:</label>
			<input type="text" name="diachi" class="form-control" id="diachi" value="<?php echo $value['diachi'];?>">
		</fieldset>

		<fieldset class="form-group">
			<label for="email">Email:</label>
			<input type="email" name="email" class="form-control" id="email" value="<?php echo $value['email'];?>">
			
		</fieldset>

		<button type="submit" class="btn btn-success">Update</button>
		<div style="color:red" id="err"><?php echo $this->session->flashdata("errorUpdate");?></div>
		
		</div>
			</div>
		</div>
	</form>
		</div>
	</div>
	<?php endforeach ?>
	<?php require('footer.php'); ?>
	

</body>
</html>