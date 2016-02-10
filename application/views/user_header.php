<!DOCTYPE html>
<html>
<head>
	<title><?php echo $system_name; ?> </title>
	<!-- CSS -->
	<link rel="icon" href="<?php echo base_url("assets/img/logo.png"); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/custom-background.css"); ?>">
</head>
<body>
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
					<li><a href="<?php echo site_url("home"); ?>"><i class="glyphicon glyphicon-home"></i> Home</a></li>
		        </ul>
		        <ul class="nav navbar-nav navbar-right">
		            <li><a href="<?php echo site_url("home_id"); ?>" title="Versi Bahasa Indonesia"><i class="glyphicon glyphicon-globe"></i> Bahasa Indonesia</a></li>
		            <li><a href="<?php echo site_url("backend"); ?>"><i class="glyphicon glyphicon-log-in"></i> Sign In</a></li>
		        </ul>
			</div><!--/.nav-collapse -->
		</div>
    </nav>
