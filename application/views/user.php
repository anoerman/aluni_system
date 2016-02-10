<div style="padding-top:60px"></div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>
			User List
			<span class="pull-right"><a href="<?php echo site_url("backend/user_add"); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-user"></i> &nbsp; Add User</a></span>
			</h3>

			<div>
				<?php if ($this->session->flashdata("user_info")!="") {
					echo "<div class='alert alert-info'>".$this->session->flashdata("user_info")."</div>";
				} ?>
			</div>

			<div class="panel panel-default">
				<div class="panel-body">
					<?php if (isset($user_list)) { ?>
						<table class="table table-condensed table-striped" id="datatable">
							<thead>
								<tr>
									<th>No</th>
									<th>Username</th>
									<th>Real Name</th>
									<th>Level</th>
									<th>Active</th>
									<th>Password</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$no        = 0;
									$datatable = "";
									foreach ($user_list->result() as $data) {
										$dt_username = $data->username;
										$first_name  = stripslashes(ucwords(strtolower($data->first_name)));
										$last_name   = stripslashes(ucwords(strtolower($data->last_name)));
										$level       = ucwords($data->level);
										$privileges  = $data->privileges;
										$active      = ucwords($data->active);
										if ($data->status=="unchanged") {
											$status = $data->password;
										}
										else {
											$status = "-";
										}
										$no++;

										// Del button
										$del_button = "";
										if ($this->session->userdata("privileges")=="*") {
											$del_button = "<a class='btn btn-default' href='".site_url("backend/user_delete/$dt_username")."' onclick=\"return confirm('Yakin hapus data Username : $dt_username? Data yang telah dihapus tidak dapat dikembalikan!')\"><i class='glyphicon glyphicon-trash'></i> Hapus</a>";
										}

										// Set row
										$datatable .= "<tr>
											<td>$no</td>
											<td>$dt_username</td>
											<td>$first_name $last_name</td>
											<td>$level</td>
											<td>$active</td>
											<td>$status</td>
											<td>
												<a class='btn btn-default' href='".site_url("backend/user_edit/$dt_username")."'><i class='glyphicon glyphicon-pencil'></i> Edit</a> 
												$del_button
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