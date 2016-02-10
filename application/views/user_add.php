<div style="padding-top:60px"></div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>Add New User</h3>
			<div>
				<?php
				if ($this->session->flashdata("user_edit_info")!="") {
					echo "<div class='alert alert-info'>".$this->session->flashdata("user_edit_info")."</div>";
				}

				// Show validation errors!
				echo validation_errors('<div class="alert alert-danger">', '</div>');

				?>
			</div>
			<div class="panel panel-default">
				<div class="panel-body">
					<form class="form form-horizontal" method="post" action="<?php echo site_url("backend/user_add_process"); ?>">
						<div class="form-group <?php if (form_error('username')){echo 'has-error';}; ?>">
							<label class="control-label col-sm-3" for="username">Username</label>
							<div class="col-sm-5">
								<input name="username" id="username" class="form-control" type="text" placeholder="Username (unique)" value="<?php echo set_value("username"); ?>">
							</div>
						</div>
						<div class="form-group <?php if (form_error('first_name')){echo 'has-error';}; ?>">
							<label class="control-label col-sm-3" for="first_name">First Name</label>
							<div class="col-sm-5">
								<input name="first_name" id="first_name" class="form-control" type="text" placeholder="First Name" value="<?php echo set_value("first_name"); ?>">
							</div>
						</div>
						<div class="form-group <?php if (form_error('last_name')){echo 'has-error';}; ?>">
							<label class="control-label col-sm-3" for="last_name">Last Name</label>
							<div class="col-sm-5">
								<input name="last_name" id="last_name" class="form-control" type="text" placeholder="Last Name" value="<?php echo set_value("last_name"); ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3" for="level">Level</label>
							<div class="col-sm-3">
								<select class="form-control" name="level" id="level" onchange="user_level_check(this.value)">
									<option value="admin">Admin</option>
									<option value="user">User</option>
								</select>
							</div>
						</div>
						<div class="form-group" id="priv_div">
							<label class="control-label col-sm-3">Privileges</label>
							<div class="col-sm-9">
								<?php 
								$privileges_view = "";

								// Get privilege name
								foreach ($module_list->result() as $md) {
									$module_id   = $md->module_id;
									$module_name = $md->module_name;
									
									$privileges_view .= "<div class='checkbox'><label><input type='checkbox' class='cb_priv' name='privileges[]' value='$module_id'> $module_name</label></div>";
								}

								// Print privileges view
								echo $privileges_view;
								?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3" for="active">Active</label>
							<div class="col-sm-3">
								<select class="form-control" name="active" id="active">
									<option value="yes">Yes</option>
									<option value="no">No</option>
								</select>
								<span class="help-block">User won't be able to sign in to system if the active status is set to <strong>No</strong>.</span>
							</div>
						</div>
						<hr>
						<div class="form-group <?php if (form_error('new_password')){echo 'has-error';}; ?>">
							<label class="control-label col-sm-3" for="new_password">Password</label>
							<div class="col-sm-5">
								<input name="new_password" id="new_password" class="form-control" type="password" placeholder="New Password" value="<?php echo set_value("new_password"); ?>">
							</div>
						</div>
						<div class="form-group <?php if (form_error('conf_password')){echo 'has-error';}; ?>">
							<label class="control-label col-sm-3" for="conf_password">Confirm Password</label>
							<div class="col-sm-5">
								<input name="conf_password" id="conf_password" class="form-control" type="password" placeholder="Confirm New Password" value="<?php echo set_value("conf_password"); ?>">
							</div>
						</div>
						<hr>
						<div class="form-group">
							<div class="text-center">
								<a href="<?php echo site_url("backend/user"); ?>" class="btn btn-default">Cancel</a>
								<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Save Data</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function user_level_check (level) {
		if (level=="admin") {
			$("#priv_div").show('fast');
		}
		else if (level=="user") {
			$("#priv_div").hide('fast');
			$(".cb_priv").prop('checked', false);
		};
	}
</script>