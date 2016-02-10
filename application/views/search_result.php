<div style="padding-top:60px"></div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>Search Result</h3>

			<div class="alert alert-info">Found <strong><?php echo count($search_result->result()); ?> result(s)</strong> with keywords <strong><?php echo $search_string; ?></strong>.</div>

			<div class="panel panel-default">
				<div class="panel-body">
					<?php if (isset($search_result)) { ?>
						<table class="table table-condensed table-striped" id="datatable">
							<thead>
								<tr>
									<th>No</th>
									<th>Fullname</th>
									<th>Nickname</th>
									<th>Region</th>
									<th>Phone Number</th>
									<th>Generation</th>
									<th>Year Entry</th>
									<th>Year Out</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$no        = 0;
									$datatable = "";
									foreach ($search_result->result() as $data) {
										$member_id       = $data->member_id;
										$fullname        = stripslashes(ucwords(strtolower($data->fullname)));
										$nickname        = stripslashes(ucwords(strtolower($data->nickname)));
										$member_province = $data->member_province;
										$member_city     = $data->member_city;
										$phone_number_1  = $data->phone_number_1;
										$generation      = $data->generation;
										$year_entry      = $data->year_entry;
										$year_out        = $data->year_out;
										$no++;

										// Set row
										$datatable .= "<tr>
											<td>$no</td>
											<td>$fullname</td>
											<td>$nickname</td>
											<td>$phone_number_1</td>
											<td>$member_city, $member_province</td>
											<td>$generation</td>
											<td>$year_entry</td>
											<td>$year_out</td>
											<td>
												<a class='btn btn-default' href='".site_url("backend/data_detail/$member_id")."'><i class='glyphicon glyphicon-eye-open'></i> Detail</a>
												<a class='btn btn-default' href='".site_url("backend/data_edit/$member_id")."'><i class='glyphicon glyphicon-pencil'></i> Edit</a>
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

			<div class="panel-footer">
				<div class="text-center">
					<a class="btn btn-primary" href="<?php echo site_url("backend"); ?>">Back to dashboard</a>
				</div>
			</div>
		</div>
	</div>
</div>