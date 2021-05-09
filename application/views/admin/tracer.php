<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Alumni</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="button">Go!</button>
                        </span>
                    </div>
                </div>
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
                                            <th>NRP</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Tahun Lulus</th>
                                            <th>Tahun Angkatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($alumni as $row => $apa) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $apa->nrp ?></td>
                                                <td><?php echo $row->nama ?></td>
                                                <td><?php echo $row->email ?></td>
                                                <td><?php echo $row->tahun_lulus ?></td>
                                                <td><?php echo $row->tahun_angkatan ?></td>
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
                <h3 class="modal-title">Tambah Akun Alumni</h3>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo site_url('admin/addAlumni') ?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col col-lg-12">
                            <div class="form-group">
                                <label>NRP</label>
                                <input type="text" class="form-control" name="nrp" placeholder="Masukkan NRP" required="">
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap" required="">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Masukkan Email" required="">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required="">
                            </div>
                            <div class="form-group">
                                <label>Telepon</label>
                                <input type="text" class="form-control" name="telp" placeholder="Masukkan No Telepon" required="">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" placeholder="Masukkan Alamat" name="alamat" rows=5></textarea>
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
foreach ($alumni as $row) {
?>
    <div id="editModal<?= $row->id_akun ?>" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Edit Akun Alumni</h3>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo site_url('admin/editAlumni/') . $row->id_akun ?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col col-lg-12">
                                <div class="form-group">
                                    <label>NRP</label>
                                    <input type="text" class="form-control" name="nrp" placeholder="Masukkan NRP" required="" value="<?= $row->nomor_induk ?>">
                                </div>
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap" required="" value="<?= $row->nama ?>">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Masukkan Email" required="" value="<?= $row->email ?>">
                                </div>
                                <div class="form-group">
                                    <label>Telepon</label>
                                    <input type="text" class="form-control" name="telp" placeholder="Masukkan No Telepon" required="" value="<?= $row->telp ?>">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" placeholder="Masukkan Alamat" name="alamat" rows=5><?= $row->alamat ?></textarea>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="passwordnew">
                                    <small>* Kosongkan jika tidak ingin merubah password</small>
                                    <input type="hidden" class="form-control" name="password" placeholder="Masukkan Password" required="" value="<?= $row->password ?>">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary pull-right" value="Tambah" name="submit">Ubah</button>
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