<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Sign In</title>

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/custom-background.css"); ?>">

	<!-- Javascript -->
	<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.12.0.min.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>

</head>

<body>
	<div>
		<br>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<form class="form-signin" method="post" action="<?php echo site_url("backend/signin"); ?>">
					<legend>Please sign in</legend>
					<div class="form-group <?php if (form_error('username')){echo 'has-error';}; ?>">
						<label for="username" class="control-label">Username</label>
						<input type="text" name="username" id="username" class="form-control" placeholder="Username" value="<?php echo set_value("username"); ?>" size="30" required="" autofocus="">
						<?php echo form_error('username'); ?>
					</div>
					<div class="form-group <?php if (form_error('password')){echo 'has-error';}; ?>">
						<label for="inputPassword" class="contol-label">Password</label>
						<input type="password" name="password" id="password" class="form-control" placeholder="Password" value="<?php echo set_value("password"); ?>" required="">
						<?php echo form_error('password'); ?>
						<label class="text-muted"><input id="show_password" type="checkbox"> Show password</label>
					</div>
					<div class="form-group">
						<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
						<a class="btn btn-lg btn-dafault btn-block" href="<?php echo site_url("home"); ?>">Back to homepage</a>
					</div>
				</form>
				<?php if ($this->session->flashdata("signin_info")!="") {
					echo "<div class='alert alert-info'>".$this->session->flashdata("signin_info")."</div>";
				} ?>
			</div>
		</div>

    </div>
</body>

</html>