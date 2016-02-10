<div style="padding-top:60px"></div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>Member Detail</h3>

			<div class="panel panel-default">
				<div class="panel-body form-horizontal">
					<div class="row">
						<?php
						if (isset($member_data)) {
							foreach ($member_data->result() as $md) {
								$fullname        = stripslashes(ucwords(strtolower($md->fullname)));
								$nickname        = stripslashes(ucwords(strtolower($md->nickname)));
								$gender          = ucwords($md->gender);
								$place_of_birth  = $md->place_of_birth;
								$date_of_birth   = $md->date_of_birth;
								$photo           = $md->photo;
								// set default photo
								if ($photo == "") {
									$photo = "no-img.jpg";
								}
								$member_province = $md->member_province;
								$member_city     = $md->member_city;
								$address         = $md->address;
								$partner_name    = stripslashes(ucwords(strtolower($md->partner_name)));
								$childrens       = $md->childrens;
								$father_name     = stripslashes(ucwords(strtolower($md->father_name)));
								$mother_name     = stripslashes(ucwords(strtolower($md->mother_name)));
								$guardian_name   = stripslashes(ucwords(strtolower($md->guardian_name)));
								$parent_province = $md->parent_province;
								$parent_city     = $md->parent_city;
								$parent_address  = $md->parent_address;
								$home_number     = $md->home_number;
								$phone_number_1  = $md->phone_number_1;
								$phone_number_2  = $md->phone_number_2;
								$blackberry_pin  = $md->blackberry_pin;
								$email_address   = $md->email_address;
								$website_address = $md->website_address;
								$facebook        = $md->facebook;
								$twitter         = $md->twitter;
								$generation      = $md->generation;
								$year_entry      = $md->year_entry;
								$year_out        = $md->year_out;
								$last_class      = $md->last_class;
								$academic_notes  = $md->academic_notes;
							}
							?>
							<div class="form-group">
								<div class="col-sm-12">
									<p class="form-control-static text-center">
										<img class="img-thumbnail" src="<?php echo base_url("assets/img/data_photo/".$photo); ?>">
									</p>
								</div>
							</div>
							<legend class="text-center">Basic Informations </legend>
							<div class="form-group">
								<label class="control-label col-sm-3">Fullname : </label>
								<div class="col-sm-9">
									<p class="form-control-static">
										<?php echo $fullname; ?>
									</p>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Nickname : </label>
								<div class="col-sm-9">
									<p class="form-control-static">
										<?php echo $nickname; ?>
									</p>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Gender : </label>
								<div class="col-sm-9">
									<p class="form-control-static">
										<?php echo $gender; ?>
									</p>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Place & date of birth : </label>
								<div class="col-sm-9">
									<p class="form-control-static">
										<?php echo $place_of_birth." / ".$date_of_birth; ?>
									</p>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Member Address : </label>
								<div class="col-sm-9">
									<p class="form-control-static">
										<?php echo $member_province. ", ". $member_city. "<br>" .$address; ?>
									</p>
								</div>
							</div>

							<legend class="text-center">Family Informations</legend>
							<div class="form-group">
								<label class="control-label col-sm-3">Husband/Wife : </label>
								<div class="col-sm-9">
									<p class="form-control-static">
										<?php echo $partner_name; ?>
									</p>
								</div>
							</div>
							<?php // Show Children
								$dt_child = explode("|", $childrens);
								for ($i=0; $i < count($dt_child); $i++) { 
									if ($dt_child[$i]!="") {
										?>
											<div class="form-group">
												<label class="control-label col-sm-3">Children #<?php echo $i+1; ?> : </label>
												<div class="col-sm-9">
													<p class="form-control-static">
														<?php echo $dt_child[$i]; ?>
													</p>
												</div>
											</div>
										<?php
									}
								}
							?>
							
							<legend class="text-center">Parent Informations</legend>
							<div class="form-group">
								<label class="control-label col-sm-3">Father Name : </label>
								<div class="col-sm-9">
									<p class="form-control-static">
										<?php echo $father_name; ?>
									</p>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Mother Name : </label>
								<div class="col-sm-9">
									<p class="form-control-static">
										<?php echo $mother_name; ?>
									</p>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Guardian Name : </label>
								<div class="col-sm-9">
									<p class="form-control-static">
										<?php echo $guardian_name; ?>
									</p>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Parent Address : </label>
								<div class="col-sm-9">
									<p class="form-control-static">
										<?php echo $parent_province. "  ". $parent_city. "<br>" .$parent_address; ?>
									</p>
								</div>
							</div>

							<legend class="text-center">Contact Informations</legend>
							<div class="form-group">
								<label class="control-label col-sm-3">Home Number : </label>
								<div class="col-sm-9">
									<p class="form-control-static">
										<?php echo $home_number; ?>
									</p>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Phone Number 1 : </label>
								<div class="col-sm-9">
									<p class="form-control-static">
										<?php echo $phone_number_1; ?>
									</p>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Phone Number 2 : </label>
								<div class="col-sm-9">
									<p class="form-control-static">
										<?php echo $phone_number_2; ?>
									</p>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Blackberry Pin : </label>
								<div class="col-sm-9">
									<p class="form-control-static">
										<?php echo $blackberry_pin; ?>
									</p>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Email Address : </label>
								<div class="col-sm-9">
									<p class="form-control-static">
										<?php echo $email_address; ?>
									</p>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Website Address : </label>
								<div class="col-sm-9">
									<p class="form-control-static">
										<?php echo $website_address; ?>
									</p>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Facebook : </label>
								<div class="col-sm-9">
									<p class="form-control-static">
										<?php echo $facebook; ?>
									</p>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Twitter : </label>
								<div class="col-sm-9">
									<p class="form-control-static">
										<?php echo $twitter; ?>
									</p>
								</div>
							</div>

							<legend class="text-center">Academic Informations</legend>
							<div class="form-group">
								<label class="control-label col-sm-3">Generation : </label>
								<div class="col-sm-9">
									<p class="form-control-static">
										<?php echo $generation; ?>
									</p>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Year Entry : </label>
								<div class="col-sm-9">
									<p class="form-control-static">
										<?php echo $year_entry; ?>
									</p>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Year Out : </label>
								<div class="col-sm-9">
									<p class="form-control-static">
										<?php echo $year_out; ?>
									</p>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Last Class : </label>
								<div class="col-sm-9">
									<p class="form-control-static">
										<?php echo $last_class; ?>
									</p>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Academic Notes : </label>
								<div class="col-sm-9 form-control-static">
									<?php echo $academic_notes; ?>
								</div>
							</div>
							<?php
						}
						else {
							echo "Error, No Data Found!";
						}
						?>
					</div>
				</div>
				<div class="panel-footer">
					<div class="text-center">
						<a class="btn btn-primary" href="<?php echo site_url("backend/data_list"); ?>">Back to list</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>