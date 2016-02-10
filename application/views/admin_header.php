<!DOCTYPE html>
<html>
<head>
	<title><?php echo $system_name; ?> </title>
	<!-- CSS -->
	<link rel="icon" href="<?php echo base_url("assets/img/logo.png"); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
</head>
<body background="<?php echo base_url("assets/img/background.png") ?>">
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><?php echo $system_name; ?></a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li>
						<a href="<?php echo site_url("backend/dashboard"); ?>"><i class="glyphicon glyphicon-home"></i> Home</a>
					</li>
					<li>
						<a href="<?php echo site_url("backend/data_list"); ?>"><i class="glyphicon glyphicon-list"></i> Data List</a>
					</li>
					
					<?php if (strpos($user_privileges, "003")!==false || $user_privileges=="*"): ?>
						<li>
							<a href="<?php echo site_url("backend/data_add"); ?>"><i class="glyphicon glyphicon-plus"></i> Add Data</a>
						</li>
					<?php endif ?>
					
					<?php if (strpos($user_privileges, "005")!==false || $user_privileges=="*"): ?>
						<li>
							<a href="<?php echo site_url("backend/report"); ?>"><i class="glyphicon glyphicon-book"></i> Report</a>
						</li>
					<?php endif ?>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php if (strpos($user_privileges, "002")!==false || $user_privileges=="*"): ?>
			            <li>
			            	<a href="<?php echo site_url("backend/user"); ?>"><i class="glyphicon glyphicon-user"></i> Users</a>
			            </li>
					<?php endif ?>
					<?php if (strpos($user_privileges, "001")!==false || $user_privileges=="*"): ?>
			            <li>
			            	<a href="<?php echo site_url("backend/settings"); ?>"><i class="glyphicon glyphicon-cog"></i> Settings</a>
			            </li>
					<?php endif ?>
		            <li class="dropdown">
			            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $user_fullname; ?> <span class="caret"></span></a>
			            <ul class="dropdown-menu">
			            	<li>
				            	<a href="<?php echo site_url("backend_id"); ?>"><i class="glyphicon glyphicon-globe"></i> Bahasa Indonesia Version</a>
			            	</li>
			            	<li>
				            	<a href="<?php echo site_url("backend/user_setting"); ?>"><i class="glyphicon glyphicon-tasks"></i> User Setting</a>
			            	</li>
			            	<li>
				            	<a href="<?php echo site_url("backend/signout"); ?>"><i class="glyphicon glyphicon-log-out"></i> Signout</a>
			            	</li>
			            </ul>
		            </li>
		        </ul>
			</div><!--/.nav-collapse -->
		</div>
    </nav>
