<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Lowongan Pekerjaan</h3>
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
                    <a class="btn btn-success" href="" data-toggle="modal" data-target="#tambahModal"><i class="fa fa-plus"></i> Tambah Loker</a>
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
                                            <th>Perusahaan</th>
                                            <th>Jabatan/Posisi</th>
                                            <th>Status Loker</th>
                                            <th width="20%">Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($loker as $row) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $row->nama_perusahaan ?></td>
                                                <td><?php echo $row->posisi ?></td>
                                                <td><?php echo $row->status ?></td>
                                                <td>
                                                    <a class="btn btn-info btn-sm" href="<?php echo site_url('admin/pelamar/' . $row->id_loker) ?>"><i class="fa fa-users"></i> Pelamar</a> |
                                                    <a class="btn btn-warning" href="" data-toggle="modal" data-target="#editModal<?= $row->id_loker ?>"><i class="fa fa-edit"></i></a> |
                                                    <?php if ($row->status == "Menunggu Konfirmasi") { ?>
                                                        <a class="btn btn-success" href="<?php echo site_url('admin/accJobfair/') . $row->id_loker ?>"><i class="fa fa-check"></i> Publish</a>
                                                    <?php } else { ?>
                                                        <a class="btn btn-secondary" href="<?php echo site_url('admin/unpublishJobfair/') . $row->id_loker ?>"><i class="fa fa-times"></i> Unpublish</a>
                                                    <?php } ?>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Tambah Lowongan Pekerjaan</h3>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo site_url('admin/addJobfair') ?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col col-lg-12">
                            <div class="form-group">
                                <label>Nama Perusahaan</label>
                                <input type="text" class="form-control" name="nama_perusahaan" placeholder="ex :  Institut Teknologi Nasional">
                            </div>
                            <div class="form-group">
                                <label>Posisi / jabatan yang dibutuhkan</label>
                                <input type="text" class="form-control" name="posisi" placeholder="ex : Engineering Staff, Environment Staff, etc" required="">
                            </div>
                            <div class="form-group">
                                <label>Deadline</label>
                                <input type="date" class="form-control" name="deadline" placeholder="etc : 28/04/2020" required="">
                            </div>
                            <div class="form-group">
                                <label>Lokasi Perkerjaan</label>
                                <input type="text" class="form-control" name="lokasi" placeholder="ex : Jakarta, Bandung, atau alamat" required="">
                            </div>
                            <div class="form-group">
                                <label>Telepon Perusahaan</label>
                                <input type="text" class="form-control" name="telp_perusahaan" placeholder="ex : 08642136731">
                            </div>
                            <div class="form-group">
                                <label>Email Perusahaan</label>
                                <input type="email" class="form-control" name="email" placeholder="ex : Itenas@itenas.ac.id">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Loker</label>
                                <textarea name="deskripsi" id="deskripsi" placeholder="Deskripsikan tentang lowongan pekerjaan" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Syarat/Requirements</label>
                                <textarea name="syarat" id="syarat" class="editor"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Informasi</label>
                                <textarea name="informasi" id="info" class="editor"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Logo Perusahaan</label>
                                <input type="file" class="dropify" height="100" name="logo" data-max-file-size="1M" data-allowed-file-extensions="jpg png" required="">
                            </div>
                            <div class="form-group">
                                <label>File Poster</label>
                                <small style="color:red">*Bila diperlukan, dapat dikosongkan</small>
                                <input type="file" class="dropify" height="100" name="poster" data-max-file-size="1M" data-allowed-file-extensions="jpg">
                            </div>
                            <div class="form-group">
                                <label>Program studi yang dicari</label>
                                <small style="color:red">*Bila diperlukan, dapat dikosongkan</small>
                                <input type="text" class="form-control" placeholder="ex : Informatika, Teknik Mesin, Teknik Sipil, Desain Interior, etc" name="prodi">
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
foreach ($loker as $row) {
?>
    <div id="editModal<?= $row->id_loker ?>" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Edit Lowongan Pekerjaan</h3>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo site_url('admin/editLoker/') . $row->id_loker ?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col col-lg-12">
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input type="text" class="form-control" name="judul" required="" value="<?= $row->judul ?>">
                                    <input type="hidden" class="form-control" name="id_perusahaan" required="" value="<?= $row->id_perusahaan ?>">
                                </div>
                                <div class="form-group">
                                    <label>Posisi yang dibutuhkan</label>
                                    <input type="text" class="form-control" name="posisi" required="" value="<?= $row->posisi ?>">
                                </div>
                                <div class="form-group">
                                    <label>Syarat/Requirements</label>
                                    <textarea name="syarat" id="syarat" class="editor"><?= $row->syarat ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" class="editor"><?= $row->deskripsi ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>File Poster</label>
                                    <input type="file" class="dropify" height="100" data-default-file="<?php echo site_url('assets/upload/poster/') . $row->poster ?>" name="poster" data-max-file-size="1M" data-allowed-file-extensions="jpg">
                                </div>
                                <div class="form-group">
                                    <label>Program Studi yang terkait</label>
                                    <input type="text" class="form-control" name="prodi" required="" value="<?= $row->prodi ?>">
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