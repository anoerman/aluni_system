<div style="padding-top:60px"></div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>Change User Detail</h3>
			<div>
				<?php
				if ($this->session->flashdata("user_setting_info")!="") {
					echo "<div class='alert alert-info'>".$this->session->flashdata("user_setting_info")."</div>";
				}

				// Show validation errors!
				echo validation_errors('<div class="alert alert-danger">', '</div>');

				?>
			</div>
			<div class="panel panel-default">
				<div class="panel-body">
					<?php 
					if (isset($user_detail)) {
						foreach ($user_detail->result() as $data) {
							$username   = $data->username;
							$first_name = $data->first_name;
							$last_name  = $data->last_name;
							$level      = $data->level;
							$privileges = $data->privileges;
						}
					} ?>
					<form class="form-horizontal" name="user_setting" id="user_setting" method="post" action="<?php echo site_url("backend/user_setting_process"); ?>">
						<div class="form-group">
							<label class="control-label col-sm-3">
								Username
							</label>
							<div class="col-sm-4">
								<p class="form-control-static"><?php echo $username; ?></p>
								<input type="hidden" name="current_username" value="<?php echo $username; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3">
								Real Name
							</label>
							<div class="col-sm-4">
								<p class="form-control-static"><?php echo $first_name." ".$last_name; ?></p>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3">
								Privileges
							</label>
							<div class="col-sm-4">
								<p class="form-control-static">
									<?php 
									$privileges_view = "";
									// if multiple privileges
									if (strpos($privileges, "|")!==false) {
										$priv_break = explode("|", $privileges);
										for ($i=0; $i < count($priv_break); $i++) { 
											// Get privilege name
											foreach ($module_list->result() as $md) {
												$module_id   = $md->module_id;
												$module_name = $md->module_name;
												if ($priv_break[$i]==$module_id) {
													$privileges_view .= "<i class='glyphicon glyphicon-triangle-right'></i> ".$module_name;
												}
											}
											// Add break when not the last data
											if ($i<count($priv_break)) {
												$privileges_view .= "<br>";
											}
										}
									}
									else {
										if ($privileges=="*") {
											$privileges_view .= "All Privileges";
										}
										else {
											// Get privilege name
											foreach ($module_list->result() as $md) {
												$module_id   = $md->module_id;
												$module_name = $md->module_name;
												if ($privileges==$module_id) {
													$privileges_view .= $module_name;
												}
											}
										}
									}
									// Print privileges view
									echo $privileges_view;
									?>
								</p>
							</div>
						</div>
						<legend>Change Password</legend>
						<div class="form-group">
							<label class="control-label col-sm-3">
								Current Password
							</label>
							<div class="col-sm-5">
								<input type="password" name="current_password" id="current_password" class="form-control" required="" placeholder="Current Password">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3">
								New Password
							</label>
							<div class="col-sm-5">
								<input type="password" name="new_password" id="new_password" class="form-control" required="" placeholder="New Password">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3">
								New Password Confirm
							</label>
							<div class="col-sm-5">
								<input type="password" name="confirm_new_password" id="confirm_new_password" class="form-control" required="" placeholder="Confirm New Password">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12 text-center"><button class="btn btn-primary" type="submit">Change Password</button></div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>