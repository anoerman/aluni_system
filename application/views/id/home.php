<!-- <div style="padding-top:60px"></div> -->
<div class="container">

	<div class="jumbotron">
		<div class="container">
			<div class="col-md-3 text-center">
				<br>
				<img src="<?php echo base_url("assets/img/logo.png"); ?>" width="200px">
			</div>
			<div class="col-md-9">
				<h2 class="text-center">Selamat datang di <?php echo $system_name; ?></h2>
				<h3 class="text-center">Pencarian data</h3>
				<form class="form" method="post" action="<?php echo site_url("home/search") ?>">
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
						</div>
						<div class="col-sm-5">
							<label>
								<input type="checkbox" name="search_category[]" value="member_province"> Provinsi
							</label>
							<br>
							<label>
								<input type="checkbox" name="search_category[]" value="member_city"> Kota
							</label>
						</div>
					</div>
				</form>
				
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="media">
			    <div class="media-left media-top">
		        	<img class="media-object" src="<?php echo base_url("assets/img/checklist.png"); ?>" alt="<?php echo $system_name; ?>" width="120" height="120">
			    </div>
			    <div class="media-body">
			    	<h4 class="media-heading">Keterangan</h4>
			    	<?php echo $system_description; ?>
			    	
			    	<h4 class="media-heading">Lokasi</h4>
			    	<?php echo $system_location; ?>
			  	</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="media">
			    <div class="media-left media-top">
		        	<img class="media-object" src="<?php echo base_url("assets/img/analytic.png"); ?>" alt="<?php echo $system_name; ?> Fitur" width="120" height="120">
			    </div>
			    <div class="media-body">
			    	<h4 class="media-heading">Fitur</h4>
			    	<ul>
			    		<li>Tambah dan ubah data anggota</li>
			    		<li>Sistem pencarian yang dapat disesuaikan</li>
			    		<li>Laporan dalam bentuk file Excel</li>
			    		<li>Pengaturan sistem yang dapat disesuaikan</li>
			    	</ul>

			  	</div>
			</div>
		</div>
	</div>

	<hr>