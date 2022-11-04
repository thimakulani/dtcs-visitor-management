<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"  href="<?php echo base_url(); ?>/assets/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet"  href="<?php echo base_url(); ?>/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet"  href="<?php echo base_url(); ?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet"  href="<?php echo base_url(); ?>/assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
	<!-- /.login-logo -->
	<div class="card card-outline card-primary">
		<div class="card-header text-center">
			<a href="#" class="h2"><b>VISITOR</b> MANAGEMENT</a>
		</div>
		<div class="card-body">
			<p class="login-box-msg">Sign in to start your session</p>

			<form action="<?php echo site_url('Auth/login_validation'); ?>" method="post">

				<span class="text-danger">
					<?php echo $error ?>
				</span>
				<div class="input-group mb-3">
					<input type="email" class="form-control"
						   placeholder="Email"
						   value="<?php echo set_value('email');?>"
						   name="email" />

					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-envelope"></span>
						</div>
					</div>

				</div>
				<div>
					<span class="text-danger"> <?php echo form_error('email') ?> </span>
				</div>
				<div class="input-group mb-3">
					<input type="password" class="form-control"
						   value="<?php echo set_value('password');?>"
						   placeholder="Password" name="password" />
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div>

				</div>
				<div>
					<span class="text-danger"> <?php echo form_error('password') ?> </span>
				</div>
				<div class="row">
					<!-- /.col -->
					<div class="col-4">
						<button type="submit" class="btn btn-primary btn-block">Sign In</button>
					</div>
					<!-- /.col -->
				</div>
			</form>
			<!-- /.social-auth-links
				<p class="mb-1">
					<a href="forgot_password">I forgot my password</a>
				</p>
			-->
			<p class="mb-1">
				<a href="<?php echo base_url() ?>Auth/forgot_password">I forgot my password</a>
			</p>
		</div>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->

</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>/assets/dist/js/adminlte.min.js"></script>
</body>
</html>
