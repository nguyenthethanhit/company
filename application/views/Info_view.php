<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta charset="UTF-8">
	<script type="text/javascript" src="<?php echo base_url()?>vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="<?php echo base_url()?>1.js"></script>
	<link rel="stylesheet" href="<?php echo base_url()?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url()?>vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?php echo base_url()?>1.css">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<title>Infomation</title>
</head>
<body>
	<?php require('header_user.php'); ?>

	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<br>
				<h3>Thông tin người dùng</h3>
				<br>
				
			</div>
		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<?php foreach ($dulieu as $key => $value): ?>
				<div class="col-sm-4">
				<div class="card card-block">
					<h3 class="card-title"><?php echo $value['ten'] ?></h3>
					<p class="card-text">Username: <?php echo $value['username'] ?></p>
					<p class="card-text">Số điện thoại: <?php echo $value['sdt'] ?></p>
					<p class="card-text">Địa chỉ: <?php echo $value['diachi'] ?></p>
					<p class="card-text">Email: <?php echo $value['email'] ?></p>
					<a href="<?php echo base_url();?>index.php/Ctl/EditInfo_user" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
				</div>
			</div>
			<?php endforeach ?>
		</div>
	</div>
	

	<?php require('footer.php'); ?>
	

	
</body>
</html>