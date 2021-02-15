<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>E-Sertifikat</h3>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <a class="btn btn-success" href="" data-toggle="modal" data-target="#importModal"><i class="fa fa-upload"></i> Import Sertifikat</a> | <a class="btn btn-primary" href="" data-toggle="modal" data-target="#tambahModal"><i class="fa fa-plus"></i> Tambah Sertifikat</a> | <a class="btn btn-warning" href="<?php echo base_url() ?>assets/upload/import.xlsx"><i class="fa fa-download"></i> Download Format Excel</a>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="sertifikat-tab" data-toggle="tab" href="#sertifikat" role="tab" aria-controls="sertifikat" aria-selected="true">Sertifikat</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="acara-tab" data-toggle="tab" href="#acara" role="tab" aria-controls="acara" aria-selected="false">Acara</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="sertifikat" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card-box table-responsive">
                                            <table id="" class="table table-striped table-bordered datatable" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">No</th>
                                                        <th>NIM</th>
                                                        <th>Nama Lengkap</th>
                                                        <th>Email</th>
                                                        <th>ID Acara</th>
                                                        <th>Sertifikat</th>
                                                        <th width="25%">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($sertifikat as $row) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $no ?></td>
                                                            <td><?php echo $row->nim ?></td>
                                                            <td><?php echo $row->nama_lengkap ?></td>
                                                            <td><?php echo $row->email ?></td>
                                                            <td><?php echo $row->acara ?></td>
                                                            <td>
                                                                <center><a class="btn btn-success" href="<?php echo $row->drive ?>"><i class="fa fa-download"></i></a></center>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-info" href="" data-toggle="modal" data-target="#editModal<?= $row->id_sertifikat ?>"><i class="fa fa-edit"></i></a> |
                                                                <a class="btn btn-danger" href="<?php echo site_url('admin/deleteESertifikat/') . $row->id_sertifikat ?>"><i class="fa fa-trash"></i></a>
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
                            <div class="tab-pane fade" id="acara" role="tabpanel" aria-labelledby="acara-tab">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card-box table-responsive">
                                            <table id="" class="table table-striped table-bordered datatable2" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Acara</th>
                                                        <th>ID</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($acara as $row) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $no ?></td>
                                                            <td><?php echo $row->nama_acara ?></td>
                                                            <td><?php echo $row->id_acara ?></td>
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
        </div>
    </div>
</div>
<!-- /page content -->
<div id="importModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Import Excel Sertifikat</h3>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo site_url('admin/importESertifikat') ?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col col-lg-12">
                            <div class="form-group">
                                <label>Upload Excel</label>
                                <input type="file" class="dropify" height="100" name="file" required="" data-max-file-size="2M" data-allowed-file-extensions="csv xls xlsx">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary pull-right" value="Tambah" name="submit">Submit</button>
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="tambahModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Tambah Sertifikat</h3>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo site_url('admin/addESertifikat') ?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col col-lg-12">
                            <div class="form-group">
                                <label>NIM</label>
                                <input type="text" class="form-control" name="nim" required="">
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_lengkap" required="">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" required="">
                            </div>
                            <div class="form-group">
                                <label>Acara</label>
                                <select name="acara" required class="form-control">
                                    <option value="" disabled selected hidden>Pilih..</option>
                                    <?php foreach ($acara as $row) { ?>
                                        <option value="<?php echo $row->id_acara ?>"><?php echo $row->nama_acara ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Link G-Drive</label>
                                <input type="text" class="form-control" name="drive" required="">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary pull-right" value="Tambah" name="submit">Submit</button>
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
foreach ($sertifikat as $row) {
?>
    <div id="editModal<?= $row->id_sertifikat ?>" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Edit Akun Perusahaan</h3>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo site_url('admin/updateESertifikat/') . $row->id_sertifikat ?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col col-lg-12">
                                <div class="form-group">
                                    <label>NIM</label>
                                    <input type="text" class="form-control" name="nim" required="" value="<?php echo $row->nim ?>">
                                </div>
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama_lengkap" required="" value="<?php echo $row->nama_lengkap ?>">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email" required="" value="<?php echo $row->email ?>">
                                </div>
                                <div class="form-group">
                                    <label>Acara</label>
                                    <input type="text" class="form-control" name="acara" required="" value="<?php echo $row->acara ?>">
                                </div>
                                <div class="form-group">
                                    <label>Link G-Drive</label>
                                    <input type="text" class="form-control" name="drive" required="" value="<?php echo $row->drive ?>">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary pull-right" value="Tambah" name="submit">Update</button>
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