<div style="padding-top:60px"></div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>Edit User Data</h3>
			<div>
				<?php
				if ($this->session->flashdata("user_edit_info")!="") {
					echo "<div class='alert alert-info'>".$this->session->flashdata("user_edit_info")."</div>";
				}

				// Show validation errors!
				echo validation_errors('<div class="alert alert-danger">', '</div>');

				foreach ($user_detail->result() as $ud) {
					$curr_username   = $ud->username;
					$curr_first_name = $ud->first_name;
					$curr_last_name  = $ud->last_name;
					$curr_level      = $ud->level;
					$curr_active     = $ud->active;
					$curr_privileges = $ud->privileges;
				}

				?>
			</div>
			<div class="panel panel-default">
				<div class="panel-body">
					<form class="form form-horizontal" method="post" action="<?php echo site_url("backend/user_edit_process"); ?>">
						<div class="form-group">
							<label class="control-label col-sm-3">Username</label>
							<div class="col-sm-5">
								<input name="view_username" class="form-control" type="text" disabled="" value="<?php echo $curr_username; ?>">
								<input name="username" type="hidden" value="<?php echo $curr_username; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3" for="first_name">First Name</label>
							<div class="col-sm-5">
								<input name="first_name" id="first_name" class="form-control" type="text" value="<?php echo $curr_first_name; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3" for="last_name">Last Name</label>
							<div class="col-sm-5">
								<input name="last_name" id="last_name" class="form-control" type="text" value="<?php echo $curr_last_name; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3" for="level">Level</label>
							<div class="col-sm-3">
								<select class="form-control" name="level" id="level" onchange="user_level_check(this.value)">
									<option value="admin" <?php if($curr_level=="admin"){echo "selected";} ?>>Admin</option>
									<option value="user" <?php if($curr_level=="user"){echo "selected";} ?>>User</option>
								</select>
							</div>
						</div>
						<div class="form-group" id="priv_div" <?php if($curr_level=="user") {echo "style='display:none'";} ?>>
							<label class="control-label col-sm-3">Privileges</label>
							<div class="col-sm-9">
								<?php 
								$privileges_view = "";

								// Breakdown privileges
								if (strpos($curr_privileges, "|")!==false) {
									$priv_break = explode("|", $curr_privileges);
								}
								else {
									$priv_break = $curr_privileges;
								}

								// Get privilege name
								foreach ($module_list->result() as $md) {
									$module_id   = $md->module_id;
									$module_name = $md->module_name;
									
									// Set checked if the same
									if (is_array($priv_break)) {
										if (in_array($module_id, $priv_break)) {
											$privileges_view .= "<div class='checkbox'><label><input type='checkbox' class='cb_priv' name='privileges[]' value='$module_id' checked> $module_name</label></div> ";
										}
										else {
											$privileges_view .= "<div class='checkbox'><label><input type='checkbox' class='cb_priv' name='privileges[]' value='$module_id'> $module_name</label></div>";
										}
									}
									else {
										if ($module_id == $priv_break) {
											$privileges_view .= "<div class='checkbox'><label><input type='checkbox' class='cb_priv' name='privileges[]' value='$module_id' checked> $module_name</label></div> ";
										}
										else {
											$privileges_view .= "<div class='checkbox'><label><input type='checkbox' class='cb_priv' name='privileges[]' value='$module_id'> $module_name</label></div>";
										}
									}
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
									<option value="yes" <?php if($curr_active=="yes"){echo "selected";} ?>>Yes</option>
									<option value="no" <?php if($curr_active=="no"){echo "selected";} ?>>No</option>
								</select>
								<span class="help-block">User won't be able to sign in to system if the active status is set to <strong>No</strong>.</span>
							</div>
						</div>
						<hr>
						<!-- <div class="form-group">
							<label class="control-label col-sm-3" for="curr_password">Current Password</label>
							<div class="col-sm-5">
								<input name="curr_password" id="curr_password" class="form-control" type="password" placeholder="Current Password">
							</div>
						</div> -->
						<div class="form-group">
							<label class="control-label col-sm-3" for="new_password">New Password</label>
							<div class="col-sm-5">
								<input name="new_password" id="new_password" class="form-control" type="password" placeholder="New Password">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3" for="conf_password">Confirm Password</label>
							<div class="col-sm-5">
								<input name="conf_password" id="conf_password" class="form-control" type="password" placeholder="Confirm New Password">
								<span class="help-block">Fill only when you want to change password</span>
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