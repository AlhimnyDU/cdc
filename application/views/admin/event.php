<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Event</h3>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <a class="btn btn-success" href="" data-toggle="modal" data-target="#tambahModal"><i class="fa fa-plus"></i> Tambah</a>
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
                                            <th>Nama Event</th>
                                            <th width="15%">Tanggal Awal</th>
                                            <th width="15%">Tanggal Akhir</th>
                                            <th width="25%">Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($event as $row) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $row->nama_event ?></td>
                                                <td><?php echo date("d F Y", strtotime($row->tanggal_awal)) ?></td>
                                                <td><?php echo date("d F Y", strtotime($row->tanggal_akhir)) ?></td>
                                                <td>
                                                    <a class="btn btn-warning" href="" data-toggle="modal" data-target="#editModal<?= $row->id_event ?>"><i class="fa fa-edit"></i></a> |
                                                    <?php if ($row->status != "Aktif") { ?>
                                                        <a class="btn btn-primary btn-sm" href="<?php echo site_url('admin/accLoker/') . $row->id_event ?>"><i class="fa fa-check"></i>Aktif</a>
                                                    <?php } else { ?>
                                                        <a class="btn btn-secondary btn-sm" href="<?php echo site_url('admin/unpublishLoker/') . $row->id_event ?>"><i class="fa fa-times"></i>Non-aktif</a>
                                                    <?php } ?>
                                                    | <a class="btn btn-info btn-sm" href="<?php echo site_url('admin/peserta/') . $row->id_event ?>"><i class="fa fa-clipboard"></i>Peserta</a>
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
<div id="tambahModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Tambah Event</h3>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo site_url('admin/addEvent') ?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col col-lg-12">
                            <div class="form-group">
                                <label>Nama Event</label>
                                <input type="text" class="form-control" name="nama_event" placeholder="Nama Event" required="">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Awal</label>
                                <input type="date" class="form-control" name="tanggal_awal" required="">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Akhir</label>
                                <input type="date" class="form-control" name="tanggal_akhir" required="">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary pull-right" value="Tambah" name="submit">Tambah</button>
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
foreach ($event as $row) {
?>
    <div id="editModal<?= $row->id_event ?>" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Edit Event</h3>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo site_url('admin/updateEvent') ?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col col-lg-12">
                                <div class="form-group">
                                    <label>Nama Event</label>
                                    <input type="text" class="form-control" name="nama_event" placeholder="Nama Event" value="<?php echo $row->nama_event ?>" required="">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Awal</label>
                                    <input type="date" class="form-control" name="tanggal_awal" value="<?php echo $row->tanggal_awal ?>" required="">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Akhir</label>
                                    <input type="date" class="form-control" name="tanggal_akhir" value="<?php echo $row->tanggal_akhir ?>" required="">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary pull-right" value="Tambah" name="submit">Tambah</button>
                                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>