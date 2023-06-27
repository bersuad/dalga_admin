<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="Dalga Leather / Besufekade Adane" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Dalga Leather Admin | Login" />
	<meta property="og:title" content="Dalga Leather | Login" />
	<meta property="og:description" content="Dalga Leather | Login" />
	<meta property="og:image" content="social-image.png" />
	<meta name="format-detection" content="telephone=no">

	<title>Dalga Leather Admin | Login</title>

	<link rel="shortcut icon" type="image/png" href="<?php echo base_url() ?>assets/images/logo/logo.png" />
	<link href="<?php echo base_url('assets/'); ?>css/style.css" rel="stylesheet">

</head>

<body class="vh-100">
<div class="authincation h-100">
	<div class="container h-100">
		<div class="row justify-content-center h-100 align-items-center">
			<div class="col-md-6">
				<div class="authincation-content">
					<div class="row no-gutters">
						<div class="col-xl-12">
							<div class="auth-form">
								<div class="text-center mb-3">
									<img src="<?php echo base_url(); ?>assets/images/logo/logo.png" alt="" style="height: 200px; width:auto;"/>
								</div>
								<?php if ($this->session->flashdata('message')) { ?>
									<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
										<symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
											<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
										</symbol>
										<symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
											<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
										</symbol>
										<symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
											<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
										</symbol>
									</svg>								
									<div class="alert alert-success d-flex align-items-right" role="alert">
										<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
										<?= $this->session->flashdata('message') ?>
										<div style="position: absolute; right: 0; margin-right: 10px; margin-bottom: 10px;">
											<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
										</div>

									</div>
								<?php } ?>
								<?php if ($this->session->flashdata('error')) { ?>
									<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
										<symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
											<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
										</symbol>
										<symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
											<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
										</symbol>
										<symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
											<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
										</symbol>
									</svg>
									<div class="alert alert-danger d-flex align-items-center" role="alert">
										<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
										<?= $this->session->flashdata('error') ?>
										<div style="position: absolute; right: 0; margin-right: 10px; margin-bottom: 10px;">
											<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
										</div>
									</div>
									
								<?php } ?> 
								<?php if ($this->session->flashdata('warning')) { ?>
									<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
										<symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
											<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
										</symbol>
										<symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
											<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
										</symbol>
										<symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
											<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
										</symbol>
									</svg>
									<div class="alert alert-warning d-flex align-items-center" role="alert">
										<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
										<?= $this->session->flashdata('warning') ?>
										<div style="position: absolute; right: 0; margin-right: 10px; margin-bottom: 10px;">
											<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
										</div>
									</div>
									
								<?php } ?>  
								<h4 class="text-center mb-4">Sign in your account</h4>
								<form action="<?php echo base_url('Auth/login') ?>" method="POST" autocomplete="off">
									<div class="mb-3">
										<label class="mb-1"><strong>User Name</strong></label>
										<input type="text" class="form-control" autocomplete="off" name="user_name" required placeholder="Username">
									</div>
									<div class="mb-3">
										<label class="mb-1"><strong>Password</strong></label>
										<input type="password" class="form-control" autocomplete="off" name="password" required placeholder="Password">
									</div>
									<div class="row d-flex justify-content-between mt-4 mb-2">
										<div class="mb-3">
											<a href="#">Forgot Password?</a>
										</div>
									</div>
									<div class="text-center">
										<button type="submit" class="btn btn-primary btn-block">Login</button>
									</div>
								</form>
								<div class="new-account mt-3">
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<script src="<?php echo base_url('assets/'); ?>vendor/global/global.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/custom.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/dlabnav-init.js"></script>

</body>

</html>
