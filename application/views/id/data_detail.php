<div style="padding-top:60px"></div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>Detail Anggota</h3>

			<div class="panel panel-default">
				<div class="panel-body form-horizontal">
					<div class="row">
						<?php
						if (isset($member_data)) {
							foreach ($member_data->result() as $md) {
								$fullname        = stripslashes(ucwords(strtolower($md->fullname)));
								$nickname        = stripslashes(ucwords(strtolower($md->nickname)));
								$gender          = $md->gender;
								if ($gender=="male") {
									$jk = "Laki-laki";
								}
								else if ($gender=="female") {
									$jk = "Perempuan";
								}
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
							<legend class="text-center">Informasi Dasar </legend>
							<div class="form-group">
								<label class="control-label col-sm-3">Nama Lengkap : </label>
								<div class="col-sm-9">
									<p class="form-control-static">
										<?php echo $fullname; ?>
									</p>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Nama Panggilan : </label>
								<div class="col-sm-9">
									<p class="form-control-static">
										<?php echo $nickname; ?>
									</p>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Jenis Kelamin : </label>
								<div class="col-sm-9">
									<p class="form-control-static">
										<?php echo $jk; ?>
									</p>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Tempat & Tgl lahir : </label>
								<div class="col-sm-9">
									<p class="form-control-static">
										<?php echo $place_of_birth." / ".$date_of_birth; ?>
									</p>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Alamat : </label>
								<div class="col-sm-9">
									<p class="form-control-static">
										<?php echo $member_province. ", ". $member_city. "<br>" .$address; ?>
									</p>
								</div>
							</div>

							<legend class="text-center">Informasi Keluarga</legend>
							<div class="form-group">
								<label class="control-label col-sm-3">Suami / Istri : </label>
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
												<label class="control-label col-sm-3">Anak ke <?php echo $i+1; ?> : </label>
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
							
							<legend class="text-center">Informasi Orang Tua</legend>
							<div class="form-group">
								<label class="control-label col-sm-3">Nama Ayah : </label>
								<div class="col-sm-9">
									<p class="form-control-static">
										<?php echo $father_name; ?>
									</p>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Nama Ibu : </label>
								<div class="col-sm-9">
									<p class="form-control-static">
										<?php echo $mother_name; ?>
									</p>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Wali : </label>
								<div class="col-sm-9">
									<p class="form-control-static">
										<?php echo $guardian_name; ?>
									</p>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Alamat Orang tua : </label>
								<div class="col-sm-9">
									<p class="form-control-static">
										<?php echo $parent_province. "  ". $parent_city. "<br>" .$parent_address; ?>
									</p>
								</div>
							</div>

							<legend class="text-center">Informasi Kontak</legend>
							<div class="form-group">
								<label class="control-label col-sm-3">Telp Rumah : </label>
								<div class="col-sm-9">
									<p class="form-control-static">
										<?php echo $home_number; ?>
									</p>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">No Handphone 1 : </label>
								<div class="col-sm-9">
									<p class="form-control-static">
										<?php echo $phone_number_1; ?>
									</p>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">No Handphone 2 : </label>
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
								<label class="control-label col-sm-3">Alamat Email : </label>
								<div class="col-sm-9">
									<p class="form-control-static">
										<?php echo $email_address; ?>
									</p>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Alamat Website : </label>
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

							<legend class="text-center">Informasi Akademik</legend>
							<div class="form-group">
								<label class="control-label col-sm-3">Angkatan : </label>
								<div class="col-sm-9">
									<p class="form-control-static">
										<?php echo $generation; ?>
									</p>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Tahun Masuk : </label>
								<div class="col-sm-9">
									<p class="form-control-static">
										<?php echo $year_entry; ?>
									</p>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Tahun Keluar : </label>
								<div class="col-sm-9">
									<p class="form-control-static">
										<?php echo $year_out; ?>
									</p>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Kelas Terakhir : </label>
								<div class="col-sm-9">
									<p class="form-control-static">
										<?php echo $last_class; ?>
									</p>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Catatan Tambahan : </label>
								<div class="col-sm-9 form-control-static">
									<?php echo $academic_notes; ?>
								</div>
							</div>
							<?php
						}
						else {
							echo "Error, Tidak ada data ditemukan!";
						}
						?>
					</div>
				</div>
				<div class="panel-footer">
					<div class="text-center">
						<a class="btn btn-primary" href="<?php echo site_url("backend_id/data_list"); ?>">Kembali ke daftar anggota</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>