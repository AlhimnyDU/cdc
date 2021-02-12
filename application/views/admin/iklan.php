<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Iklan Lowongan, Magang, dan Beasiswa</h3>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>

	<div class="row">
		<div class="col-md-12 col-sm-12 ">
			<div class="x_panel">
				<div class="x_title">
					<a class="btn btn-success" href="<?php echo site_url('admin/tambahIklan') ?>"><i class="fa fa-plus"></i> Tambah Iklan</a>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="row">
						<div class="col-sm-12">
							<div class="card-box table-responsive">
								<table id="" class="table table-striped table-bordered datatable" style="width:100%">
									<thead>
										<tr>
											<th width="5%">No</th>
											<th>Judul Iklan</th>
											<th>Jenis</th>
											<th width="10%">Edit</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($iklan as $row) {
										?>
											<tr>
												<td><?php echo $no ?></td>
												<td><?php echo $row->judul ?></td>
												<td><?php echo $row->status ?></td>
												<td>
													<a class="btn btn-sm btn-info" href="<?php echo site_url('admin/updIklan/' . $row->id_iklan) ?>"><i class="fa fa-edit"></i></a> |
													<a class="btn btn-sm btn-danger" href="<?php echo site_url('admin/deleteIklan/' . $row->id_iklan) ?>"><i class="fa fa-trash"></i></a>
												</td>
											</tr>
										<?php
											$no++;
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /page content -->