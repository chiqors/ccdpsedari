<?php require APP_ROOT . '/views/inc/header_login.php' ?>
<div class="login-box">
	<div class="login-logo">
		<a href="<?php echo URL_ROOT; ?>">SiSedari</a>
	</div>
	<!-- /.login-logo -->
	<div class="card">
		<div class="card-body login-card-body">
			<p class="login-box-msg">Sign in to start your session</p>
			<?php flash('register_success'); ?>
			<form action="<?php echo URL_ROOT; ?>/pengguna/do_login" method="POST">
				<div class="input-group mb-3">
					<input type="text" class="form-control" name="username" placeholder="Username">
					<div class="input-group-append">
						<span class="fa fa-user input-group-text"></span>
					</div>
					<span class="invalid-feedback"><?php echo $data['username_err']; ?></span>
				</div>
				<div class="input-group mb-3">
					<input type="password" class="form-control" name="password" placeholder="Password">
					<div class="input-group-append">
						<span class="fa fa-lock input-group-text"></span>
					</div>
					<span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
				</div>
				<div class="row">
					<!-- /.col -->
					<div class="col-12">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
					</div>
					<!-- /.col -->
				</div>
			</form>
		</div>
		<!-- /.login-card-body -->
	</div>
</div>
<!-- /.login-box -->
<?php require APP_ROOT . '/views/inc/footer_login.php' ?>