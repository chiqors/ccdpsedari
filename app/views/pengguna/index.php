<?php require APP_ROOT . '/views/inc/header_login.php' ?>
<div class="login-box">
	<div class="login-logo">
		<a href="<?php echo URL_ROOT; ?>">SiSedari</a>
	</div>
	<!-- /.login-logo -->
	<div class="card">
		<div class="card-body login-card-body">
			<p class="login-box-msg">Sign in to start your session</p>
				<div class="row">
					<!-- /.col -->
					<div class="col-12">
						<a href="<?php echo URL_ROOT; ?>/pengguna/login" class="btn btn-primary btn-block btn-flat">Login</a>
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