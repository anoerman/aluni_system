<div style="padding-top:60px"></div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>Settings</h3>
			<div>
				<?php
				if ($this->session->flashdata("setting_info")!="") {
					echo "<div class='alert alert-info'>".$this->session->flashdata("setting_info")."</div>";
				}

				// Show validation errors!
				echo validation_errors('<div class="alert alert-danger">', '</div>');
				?>
			</div>
			<div class="panel panel-default">
				<div class="panel-body form-horizontal">
					<div class="container">
						<form class="form form-horizontal" method="post" action="<?php echo site_url("backend/setting_process"); ?>" enctype="multipart/form-data">

							<?php 
								if (isset($setting_data)) {
									foreach ($setting_data->result() as $sd) {
										$setting_name  = $sd->setting_name;
										$setting_value = $sd->setting_value;
										if ($setting_name=="system_name") {
											$setting_system_name = $setting_value;
										}
										else if ($setting_name=="system_location") {
											$setting_system_location = $setting_value;
										}
										else if ($setting_name=="system_description") {
											$setting_system_description = $setting_value;
										}
									}
								}
							?>

							<div class="form-group <?php if (form_error('system_name')){echo 'has-error';}; ?>">
								<label for="system_name" class="control-label col-sm-3">System Name</label>
								<div class="col-sm-6">
									<input type="text" name="system_name" id="system_name" class="form-control" placeholder="System Name" required="" value="<?php echo $setting_system_name; ?>">
								</div>
							</div>
							<div class="form-group <?php if (form_error('system_location')){echo 'has-error';}; ?>">
								<label for="system_location" class="control-label col-sm-3">System Location</label>
								<div class="col-sm-6">
									<textarea name="system_location" id="system_location" class="form-control datatable"><?php echo $setting_system_location; ?></textarea>
								</div>
							</div>
							<div class="form-group <?php if (form_error('system_description')){echo 'has-error';}; ?>">
								<label for="system_description" class="control-label col-sm-3">System Description</label>
								<div class="col-sm-6">
									<textarea name="system_description" id="system_description" class="form-control datatable"><?php echo $setting_system_description; ?></textarea>
								</div>
							</div>
							<div class="form-group text-center">
								<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Save</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>