<div style="padding-top:60px"></div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>Daftar Data</h3>

			<div class="panel panel-default">
				<div class="panel-body">
					<?php if (isset($data_list)) { ?>
						<table class="table table-condensed table-striped" id="datatable">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Lengkap</th>
									<th>Nama Panggilan</th>
									<th>No Handphone</th>
									<th>Angkatan</th>
									<th>Tahun Masuk</th>
									<th>Tahun Keluar</th>
									<th>Aktif</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$no        = 0;
									$datatable = "";
									foreach ($data_list->result() as $data) {
										$member_id      = $data->member_id;
										$fullname       = stripslashes(ucwords(strtolower($data->fullname)));
										$nickname       = stripslashes(ucwords(strtolower($data->nickname)));
										$phone_number_1 = $data->phone_number_1;
										$generation     = $data->generation;
										$year_entry     = $data->year_entry;
										$year_out       = $data->year_out;
										$active         = ucwords($data->active);
										$no++;

										// Edit button
										$edit_button = "";
										if (strpos($user_privileges, "004")!==false || $user_privileges=="*") {
											$edit_button = "<a class='btn btn-default' href='".site_url("backend_id/data_edit/$member_id")."'><i class='glyphicon glyphicon-pencil'></i> Ubah</a>";
										}

										// Set row
										$datatable .= "<tr>
											<td>$no</td>
											<td>$fullname</td>
											<td>$nickname</td>
											<td>$phone_number_1</td>
											<td>$generation</td>
											<td>$year_entry</td>
											<td>$year_out</td>
											<td>$active</td>
											<td>
												<a class='btn btn-default' href='".site_url("backend_id/data_detail/$member_id")."'><i class='glyphicon glyphicon-eye-open'></i> Detail</a>
												$edit_button
											</td>
										</tr>";
									}
									echo $datatable;
								?>
							</tbody>
						</table>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>