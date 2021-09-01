<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link href="<?= base_url('bootstrap/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo(base_url()) ?>assets/css/mycss.css">


<style type="text/css">
	body{
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
	}
	.login{
		margin: 15%;
		border:2px solid white;
		border-radius: 5px;
		box-shadow: 4px 4px 8px yellow;
		padding: 30px;
		background-color: white;
		font-size: 1.5em;
		font-weight: bolder;
	}
	.form-control:focus{
		background-color: rgba(0,0,0,.7);
		color: white;
	}
	.form-control{
		padding: 20px;
	}
	button{
		border:5px groove green;
		box-shadow: 10px 10px 10px gray;
		text-shadow: 1px 1px 2px green;
		background-color: black;
		color: blue;
		border-radius:15px 5px;
		font-size: 1.2em;
		width: 100%;
		padding: 10px 0 10px 0;	
	}
</style>
</head>
<body style="background-color: rgba(0,0,0,.7);">
<section class="row container">
	<div class="col-md-6 col-xs-6 col-sm-6 login">
	<?=form_open('Admin/dashboard'); ?>
	<div class="form-group">
		<label for="Username">Username:</label>
		<?=form_input(['class'=>'form-control','type'=>'text','name'=>'username','placeholder'=>'Enter Username','value'=>set_value('username')]) ?>
	</div>
	<div class="form-group">
		<label for="Password">Password:</label>
		<?=form_input(['class'=>'form-control','type'=>'password','name'=>'password','placeholder'=>'******','value'=>set_value('password')]) ?>
	</div>
	<div class="form-group">
		
		<button type="submit">Submit</button>
	</div>
	<div class="form-group text-danger" style="">
		<?php 
			if($error=$this->session->flashdata('admin_login'))
				echo $error;
		?>
	</div>
	<?=form_close();?>
	</div>
</section>
</body>
</html>