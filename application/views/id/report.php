<div style="padding-top:60px"></div>
<div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
		<div class="col-md-2">
			<img class="img-circle" src="<?php echo base_url("assets/img/graph.png"); ?>" alt="Report Generate" width="140" height="140">
		</div><!-- /.col-md-2 -->
		<div class="col-md-10">
			<h2>Pembuatan Laporan</h2>
			<p>Buat laporan berdasarkan kriteria yang anda butuhkan. Tipe file laporan yang tersedia saat ini adalah file excel.</p>
			<p>Laporan lanjutan masih dalam proses pengembangan.</p>
			
		</div><!-- /.col-md-10 -->
	</div>
	<br>
	<div class="row">
		<div class="col-md-3">
			<legend>Laporan Semua Data</legend>
			<p class="text-center">
				<a class="btn btn-primary btn-block" href="<?php echo site_url("backend_id/report_per_name"); ?>" alt="All Report (By Name)" role="button"> <i class="glyphicon glyphicon-user"></i> Buat Laporan »</a>
			</p>
		</div>
		<div class="col-md-3">
			<legend>Per Regional</legend>
			<div id="regional_select_div">
				<select name="regional_select" class="form-control chosen-select" data-placeholder="Regional" onchange="regional_report_url(this.value)">
					<option value=""></option>
					<?php echo $regional_select; ?>
				</select>
			</div>
			<p class="text-center">
				<a class="btn btn-primary btn-block" role="button" id="regional_select"> <i class="glyphicon glyphicon-globe"></i> Buat Laporan »</a>
			</p>
		</div>
		<div class="col-md-3">
			<legend>Per Angkatan</legend>
			<p class="text-center">
				<a class="btn btn-primary btn-block disabled" href="<?php echo site_url("backend_id/report_per_generation"); ?>" role="button"> <i class="glyphicon glyphicon-flag"></i> Buat Laporan »</a>
			</p>
		</div>
		<div class="col-md-3">
			<legend>Laporan lanjutan</legend>
			<p class="text-center">
				<a class="btn btn-primary btn-block disabled" href="#" role="button"> <i class="glyphicon glyphicon-wrench"></i> Buat Laporan »</a>
			</p>
		</div>
    </div><!-- /.row -->

<script type="text/javascript">
	function regional_report_url(city_id) {
		$("#regional_select").attr("href", "<?php echo site_url('backend_id/report_per_regional') ?>/"+city_id);
	}
</script>