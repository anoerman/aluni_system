<div style="padding-top:60px"></div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>Add New Data</h3>
			<div>
				<?php
				if ($this->session->flashdata("add_data_info")!="") {
					echo "<div class='alert alert-info'>".$this->session->flashdata("add_data_info")."</div>";
				}

				// Show validation errors!
				echo validation_errors('<div class="alert alert-danger">', '</div>');

				?>
			</div>
			<div class="panel panel-default">
				<div class="panel-body">
					<form class="form" method="post" action="<?php echo site_url("backend/data_add_process"); ?>" enctype="multipart/form-data">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active">
								<a href="#basic_info" aria-controls="basic_info" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-user"></i> Basic</a>
							</li>
							<li role="presentation">
								<a href="#family_info" aria-controls="family_info" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-home"></i> Family</a>
							</li>
							<li role="presentation">
								<a href="#parent_info" aria-controls="parent_info" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-home"></i> Parents</a>
							</li>
							<li role="presentation">
								<a href="#contact_info" aria-controls="contact_info" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-phone"></i> Contact</a>
							</li>
							<li role="presentation">
								<a href="#academic_info" aria-controls="academic_info" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-education"></i> Academic</a>
							</li>
							<li role="presentation">
								<a href="#account_info" aria-controls="account_info" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-wrench"></i> Account</a>
							</li>
						</ul>

						<!-- Tab panes -->
						<div class="tab-content">
							<!-- BASIC INFORMATION -->
							<div role="tabpanel" class="tab-pane active" id="basic_info">
								<div class="container">
									<div class="col-sm-10 form-horizontal">
										<br>
										<div class="form-group <?php if (form_error('fullname')){echo 'has-error';}; ?>">
											<label for="fullname" class="control-label col-sm-3">Full Name</label>
											<div class="col-sm-6">
												<input type="text" name="fullname" id="fullname" class="form-control" placeholder="Full Name" required="" value="<?php echo set_value("fullname"); ?>" onchange="auto_nickname(this.value)">
											</div>
										</div>
										<div class="form-group <?php if (form_error('nickname')){echo 'has-error';}; ?>">
											<label for="nickname" class="control-label col-sm-3">Nickname</label>
											<div class="col-sm-9">
												<div class="row">
													<div class="col-sm-8">
														<input type="text" name="nickname" id="nickname" class="form-control" placeholder="Nickname" value="<?php echo set_value("nickname"); ?>" onchange="auto_username(this.value)">
													</div>
													<div class="col-sm-4">
														<p class="form-control-static" id="nickname_suggestion"></p>
													</div>
												</div>
												<p class="help-block">Nickname must be unique because it will be used as username to sign in into system. You can change suggested nickname.</p>
											</div>
										</div>
										<div class="form-group <?php if (form_error('gender')){echo 'has-error';}; ?>">
											<label for="gender" class="control-label col-sm-3">Gender</label>
											<div class="col-sm-6">
												<div class="radio">
													<label>
														<input type="radio" name="gender" id="gender_m" value="male" <?php echo  set_radio('gender', 'male', TRUE); ?>> Male
													</label>
												</div>
												<div class="radio">
													<label>
														<input type="radio" name="gender" id="gender_f" value="female" <?php echo  set_radio('gender', 'female'); ?>> Female
													</label>
												</div>
											</div>
										</div>
										<div class="form-group <?php if (form_error('place_of_birth')){echo 'has-error';}; ?>">
											<label for="place_of_birth" class="control-label col-sm-3">Place of birth</label>
											<div class="col-sm-6">
												<select name="place_of_birth" id="place_of_birth" class="form-control chosen-select" data-placeholder="Place of birth">
													<option value=""></option>
													<?php 
														echo $select_place_of_birth;
													?>
												</select>
											</div>
										</div>
										<div class="form-group <?php if (form_error('date_of_birth')){echo 'has-error';}; ?>">
											<label for="date_of_birth" class="control-label col-sm-3">Date of birth</label>
											<div class="col-sm-6">
												<input type="text" name="date_of_birth" id="date_of_birth" class="form-control datepicker" placeholder="Date of birth" required="" value="<?php echo set_value("date_of_birth"); ?>">
											</div>
										</div>
										<div class="form-group">
											<label for="photo" class="control-label col-sm-3">Photo</label>
											<div class="col-sm-6">
												<input type="file" name="photo" id="photo" class="form-control" placeholder="Upload Photo">
												<span class="help-block">File type must be jpg, gif or png. Max size : 2 Mb.</span>
											</div>
										</div>
										<div class="form-group">
											<label for="active" class="control-label col-sm-3">Active</label>
											<div class="col-sm-6">
												<select class="form-control" name="active" id="active">
													<option value="yes">Yes</option>
													<option value="no">No</option>
												</select>
												<span class="help-block">User won't be able to sign in to system if the active status is set to <strong>No</strong>.</span>
											</div>
										</div>

										<hr>

										<legend class="text-center">Address</legend>
										<div class="form-group">
											<label for="province_city" class="control-label col-sm-3">City</label>
											<div class="col-sm-6">
												<select name="province_city" id="province_city" class="form-control chosen-select" data-placeholder="City">
													<option value=""></option>
													<?php 
														echo $select_province_city;
													?>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label for="address" class="control-label col-sm-3">Address</label>
											<div class="col-sm-8">
												<textarea name="address" id="address" class="form-control" rows="5" placeholder="Address"><?php echo set_value("address"); ?></textarea>
											</div>
										</div>
										
									</div>
								</div>
							</div>

							<!-- FAMILY INFORMATION -->
							<div role="tabpanel" class="tab-pane fade" id="family_info">
								<div class="container">
									<div class="col-sm-10 form-horizontal">
										<br>
										<div class="form-group">
											<label for="partner_name" class="control-label col-sm-3">Husband / Wife</label>
											<div class="col-sm-6">
												<input type="text" name="partner_name" id="partner_name" class="form-control" placeholder="Husband or Wife Name" value="<?php echo set_value("partner_name"); ?>">
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-sm-3">Children</label>
											<div class="col-sm-6">
												<input type="text" name="childrens[]" class="form-control" placeholder="Children" value="<?php echo set_value('childrens[]'); ?>"><br>
												<input type="text" name="childrens[]" class="form-control" placeholder="Children" value="<?php echo set_value('childrens[]'); ?>"><br>
												<input type="text" name="childrens[]" class="form-control" placeholder="Children" value="<?php echo set_value('childrens[]'); ?>"><br>
												<input type="text" name="childrens[]" class="form-control" placeholder="Children" value="<?php echo set_value('childrens[]'); ?>"><br>
												<input type="text" name="childrens[]" class="form-control" placeholder="Children" value="<?php echo set_value('childrens[]'); ?>"><br>
												<input type="text" name="childrens[]" class="form-control" placeholder="Children" value="<?php echo set_value('childrens[]'); ?>"><br>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- PARENTS INFORMATION -->
							<div role="tabpanel" class="tab-pane fade" id="parent_info">
								<div class="container">
									<div class="col-sm-10 form-horizontal">
										<br>
										<div class="form-group <?php if (form_error('father_name')){echo 'has-error';}; ?>">
											<label for="father_name" class="control-label col-sm-3">Father Name</label>
											<div class="col-sm-6">
												<input type="text" name="father_name" id="father_name" class="form-control" placeholder="Father Name" value="<?php echo set_value("father_name"); ?>">
											</div>
										</div>
										<div class="form-group <?php if (form_error('mother_name')){echo 'has-error';}; ?>">
											<label for="mother_name" class="control-label col-sm-3">Mother Name</label>
											<div class="col-sm-6">
												<input type="text" name="mother_name" id="mother_name" class="form-control" placeholder="Mother Name" value="<?php echo set_value("mother_name"); ?>">
											</div>
										</div>
										<div class="form-group <?php if (form_error('guardian_name')){echo 'has-error';}; ?>">
											<label for="guardian_name" class="control-label col-sm-3">Guardian Name</label>
											<div class="col-sm-6">
												<input type="text" name="guardian_name" id="guardian_name" class="form-control" placeholder="Guardian Name" value="<?php echo set_value("guardian_name"); ?>">
												<span class="help-block">Optional</span>
											</div>
										</div>

										<hr>

										<legend class="text-center">Parents Address</legend>
										<div class="form-group">
											<label for="parent_province_city" class="control-label col-sm-3">City</label>
											<div class="col-sm-6">
												<select name="parent_province_city" id="parent_province_city" class="form-control chosen-select" data-placeholder="City">
													<option value=""></option>
													<?php 
														echo $select_province_city;
													?>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label for="parent_address" class="control-label col-sm-3">Address</label>
											<div class="col-sm-8">
												<textarea name="parent_address" id="parent_address" class="form-control" rows="5" placeholder="Address"><?php echo set_value("parent_address"); ?></textarea>
											</div>
										</div>
										
									</div>
								</div>
							</div>

							<!-- CONTACT INFORMATION -->
							<div role="tabpanel" class="tab-pane fade" id="contact_info">
								<div class="container">
									<div class="col-sm-10 form-horizontal">
										<br>
										<div class="form-group <?php if (form_error('home_number')){echo 'has-error';}; ?>">
											<label for="home_number" class="control-label col-sm-3">Home Number</label>
											<div class="col-sm-2">
												<input type="text" name="ext_home_number" id="ext_home_number" class="form-control" placeholder="Region Code" value="<?php echo set_value("ext_home_number"); ?>">
											</div>
											<div class="col-sm-4">
												<input type="text" name="home_number" id="home_number" class="form-control" placeholder="Home Number" value="<?php echo set_value("home_number"); ?>">
											</div>
											<div class="row">
												<div class="col-sm-4-offset-3">
													<span class="help-block">Example : 021 78965412</span>
												</div>
											</div>
										</div>
										<div class="form-group <?php if (form_error('phone_number')){echo 'has-error';}; ?>">
											<label for="phone_number" class="control-label col-sm-3">Phone Number 1</label>
											<div class="col-sm-4">
												<input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="Phone Number" value="<?php echo set_value("phone_number"); ?>">
											</div>
										</div>
										<div class="form-group <?php if (form_error('phone_number_2')){echo 'has-error';}; ?>">
											<label for="phone_number_2" class="control-label col-sm-3">Phone Number 2</label>
											<div class="col-sm-4">
												<input type="text" name="phone_number_2" id="phone_number_2" class="form-control" placeholder="Phone Number 2" value="<?php echo set_value("phone_number_2"); ?>">
											</div>
										</div>
										<div class="form-group <?php if (form_error('blackberry_pin')){echo 'has-error';}; ?>">
											<label for="blackberry_pin" class="control-label col-sm-3">Blackberry Pin</label>
											<div class="col-sm-4">
												<input type="text" name="blackberry_pin" id="blackberry_pin" class="form-control" placeholder="Blackberry Pin" value="<?php echo set_value("blackberry_pin"); ?>">
											</div>
										</div>
										<div class="form-group <?php if (form_error('email_address')){echo 'has-error';}; ?>">
											<label for="email_address" class="control-label col-sm-3">Email Address</label>
											<div class="col-sm-6">
												<input type="text" name="email_address" id="email_address" class="form-control" placeholder="Email Address" value="<?php echo set_value("email_address"); ?>">
											</div>
										</div>
										<div class="form-group <?php if (form_error('website_address')){echo 'has-error';}; ?>">
											<label for="website_address" class="control-label col-sm-3">Website Address</label>
											<div class="col-sm-6">
												<input type="text" name="website_address" id="website_address" class="form-control" placeholder="Web Address" value="<?php echo set_value("website_address"); ?>">
											</div>
										</div>

										<hr>

										<legend class="text-center">Social Media (Optional)</legend>
										<div class="form-group <?php if (form_error('facebook_profile')){echo 'has-error';}; ?>">
											<label for="facebook_profile" class="control-label col-sm-3">Facebook</label>
											<div class="col-sm-6">
												<input type="text" name="facebook_profile" id="facebook_profile" class="form-control" placeholder="Facebook" value="<?php echo set_value("facebook_profile"); ?>">
												<span class="help-block">example : http://facebook.com/aluni_system</span>
											</div>
										</div>
										<div class="form-group <?php if (form_error('twitter_profile')){echo 'has-error';}; ?>">
											<label for="twitter_profile" class="control-label col-sm-3">Twitter</label>
											<div class="col-sm-6">
												<input type="text" name="twitter_profile" id="twitter_profile" class="form-control" placeholder="twitter" value="<?php echo set_value("twitter_profile"); ?>">
												<span class="help-block">example : @aluni_system</span>
											</div>
										</div>
										
									</div>
								</div>
							</div>

							<!-- ACADEMIC INFORMATION -->
							<div role="tabpanel" class="tab-pane fade" id="academic_info">
									<div class="container">
									<div class="col-sm-10 form-horizontal">
										<br>
										<div class="form-group <?php if (form_error('generation')){echo 'has-error';}; ?>">
											<label for="generation" class="control-label col-sm-3">Generation</label>
											<div class="col-sm-6">
												<input type="text" name="generation" id="generation" class="form-control" placeholder="Generation (ex : IV)" value="<?php echo set_value("generation"); ?>">
											</div>
										</div>
										<div class="form-group <?php if (form_error('year_entry')){echo 'has-error';}; ?>">
											<label for="year_entry" class="control-label col-sm-3">Year Entry</label>
											<div class="col-sm-6">
												<input type="text" name="year_entry" id="year_entry" class="form-control" maxlength="4" placeholder="Year Entry (ex : 2000)" value="<?php echo set_value("year_entry"); ?>">
											</div>
										</div>
										<div class="form-group <?php if (form_error('year_out')){echo 'has-error';}; ?>">
											<label for="year_out" class="control-label col-sm-3">Year Out</label>
											<div class="col-sm-6">
												<input type="text" name="year_out" id="year_out" class="form-control" maxlength="4" placeholder="Year Out (ex : 2005)" value="<?php echo set_value("year_out"); ?>">
											</div>
										</div>
										<div class="form-group <?php if (form_error('last_class')){echo 'has-error';}; ?>">
											<label for="last_class" class="control-label col-sm-3">Last class</label>
											<div class="col-sm-6">
												<input type="text" name="last_class" id="last_class" class="form-control" placeholder="Last class" value="<?php echo set_value("last_class"); ?>">
											</div>
										</div>
										<div class="form-group">
											<label for="academic_notes" class="control-label col-sm-3">Additional Notes</label>
											<div class="col-sm-8">
												<textarea name="academic_notes" id="academic_notes" class="form-control" rows="5" placeholder="Additional Notes"><?php echo set_value("academic_notes"); ?></textarea>
											</div>
										</div>
										
									</div>
								</div>
							</div>


							<!-- ACCOUNT INFORMATION -->
							<div role="tabpanel" class="tab-pane fade" id="account_info">
									<div class="container">
									<div class="col-sm-10 form-horizontal">
										<br>
										<div class="form-group <?php if (form_error('username')){echo 'has-error';}; ?>">
											<label for="username" class="control-label col-sm-3">Username</label>
											<div class="col-sm-6">
												<input type="text" name="username_view" id="username_view" class="form-control" placeholder="Username" disabled="" value="<?php echo set_value("username"); ?>">
												<input type="hidden" name="username" id="username" value="<?php echo set_value("username"); ?>">
											</div>
										</div>
										<div class="form-group <?php if (form_error('password')){echo 'has-error';}; ?>">
											<label for="password" class="control-label col-sm-3">Password</label>
											<div class="col-sm-6">
												<input type="password" name="password" id="password" class="form-control" minlength="5" placeholder="Password" value="<?php echo hash("crc32", rand()); ?>">
												<label class="text-muted"><input id="show_password" type="checkbox"> Show password</label>
											</div>
										</div>
										
									</div>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="text-center">
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
	// Function to create auto nickname based on fullname
	function auto_nickname (fullname) {
		// Var
		var fullname             = $.trim(fullname);
		var fullname             = fullname.replace(/\s\s+/g, ' ');
		var nickname             = "";
		var nickname_suggestion  = "";
		var nickname_suggestion2 = "";
		var spacing              = fullname.indexOf(" ");
		if (spacing>-1) {
			var name_break = fullname.split(" ");
			if (name_break.length>1) {
				for (var i = name_break.length - 1; i >= 0; i--) {
					if (i==0) {
						nickname = name_break[i].toLowerCase()+nickname;
						nickname_suggestion += name_break[i].toLowerCase();
						nickname_suggestion2 = name_break[i].toLowerCase().substr(0,1)+nickname_suggestion2;
					}
					else {
						nickname = name_break[i].toLowerCase().substr(0,1)+nickname;
						nickname_suggestion += name_break[i].toLowerCase().substr(0,1);
						if (i>1) {
							nickname_suggestion2 = name_break[i].toLowerCase().substr(0,1)+nickname_suggestion2;
						}
						else {
							nickname_suggestion2 = name_break[i].toLowerCase()+nickname_suggestion2;
						}
					}
				}
			}
			else {
				nickname = name_break;
			}
		}
		else {
			nickname = fullname.toLowerCase();
		}

		// Set value to nickname field
		$("#nickname").val(nickname);
		if ($("#fullname").val()=="") {
			$("#nickname_suggestion").html("");
		}
		else {
			$("#nickname_suggestion").html("Suggestion : "+nickname+" / "+nickname_suggestion+" / "+nickname_suggestion2);
		}

		// Call set username
		auto_username(nickname);
	}

	// Function to set username
	function auto_username (nickname) {
		var nickname = $.trim(nickname);
		$("#username").val(nickname);
		$("#username_view").val(nickname);
	}
</script>