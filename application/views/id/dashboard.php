<div class="container">

	<!-- Search Field -->
	<div class="jumbotron">
		<div class="container">
			<div class="col-md-3 text-center">
				<br>
				<img src="<?php echo base_url("assets/img/logo.png"); ?>" width="200px">
			</div>
			<div class="col-md-9">
				<h2 class="text-center">Pencarian Data</h2>
				<form class="form" method="post" action="<?php echo site_url("backend_id/search") ?>">
					<div class="form-group">
						<div class="col-md-10 col-md-offset-1">
							<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-10 col-md-offset-1">
							<div class="input-group">
								<input type="text" name="search" id="search" class="form-control" placeholder="Cari">
								<span class="input-group-btn">
									<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> &nbsp; Cari</button>
								</span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-5 col-sm-offset-1">
							<label class="control-label">
								<input type="checkbox" name="search_category[]" value="fullname" checked="checked" disabled=""> Nama
							</label>
							<br>
							<label class="control-label">
								<input type="checkbox" name="search_category[]" value="generation"> Angkatan
							</label>
							<br>
							<label class="control-label">
								<input type="checkbox" name="search_category[]" value="year_entry"> Tahun Masuk
							</label>
							<br>
							<label class="control-label">
								<!-- <input type="checkbox" name="search_category[]" value="phone_number_1"> Phone Number -->
							</label>
						</div>
						<div class="col-sm-5">
							<label>
								<input type="checkbox" name="search_category[]" value="member_province"> Provinsi
							</label>
							<br>
							<label>
								<input type="checkbox" name="search_category[]" value="member_city"> Kota
							</label>
							<br>
							<label>
								<input type="checkbox" name="search_category[]" value="year_out"> Tahun Keluar
							</label>
							<br>
							<label>
								<!-- <input type="checkbox" name="search_category[]" value="email_address"> Email Address -->
							</label>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<hr>

    <!-- Two columns main features -->
    <div class="row">
		<div class="col-md-6 text-center">
			<img class="img-circle" src="<?php echo base_url("assets/img/man.png"); ?>" alt="Member Management" width="100" height="100">
			<h2>Pengaturan Anggota</h2>
			<p>
				<a class="btn btn-default" href="<?php echo site_url("backend_id/data_list"); ?>" role="button"><i class="glyphicon glyphicon-list"></i> Daftar Anggota</a>
				<?php if (strpos($user_privileges, "003")!==false || $user_privileges=="*"): ?>
					<a class="btn btn-default" href="<?php echo site_url("backend_id/data_add") ?>" role="button"><i class="glyphicon glyphicon-plus"></i> Tambah Anggota</a>
				<?php endif ?>
			</p>
			<p>Total anggota sekarang : <strong><?php echo $member_total; ?> Orang</strong></p>
			<p>Atur data anggota, anda dapat melakukan penambahan, melakukan perubahan pada data anggota serta mengaktifkan atau me-nonaktifkan anggota.</p>
		</div><!-- /.col-md-6 -->

		<div class="col-md-6 text-center">
			<img class="img-circle" src="<?php echo base_url("assets/img/analytic.png"); ?>" alt="Report Generate" width="100" height="100">
			<h2>Pembuatan Laporan</h2>
			
			<?php if (strpos($user_privileges, "005")!==false || $user_privileges=="*"): ?>
			<p>
				<a class="btn btn-default" href="<?php echo site_url("backend_id/report"); ?>" role="button"><i class="glyphicon glyphicon-book"></i> Laporan</a>
			</p>
			<?php endif ?>
			<p>Tipe laporan tersedia : <strong>File Excel</strong></p>
			<p>Pembuatan laporan berdasarkan berbagai kategori, laporan keseluruhan, laporan berdasarkan daerah dan lain lain.</p>
		</div><!-- /.col-md-6 -->
    </div><!-- /.row -->
    <div class="row">
    	<div class="col-md-12">
    		<hr>
    	</div>
    </div>