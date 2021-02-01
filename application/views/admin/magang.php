<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Magang</h3>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <a class="btn btn-success" href="" data-toggle="modal" data-target="#tambahModal"><i class="fa fa-plus"></i> Tambah Magang</a>
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
                                            <th width="25%">Edit</th>
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
                                                        <a class="btn btn-success" href="<?php echo site_url('admin/loker_persyaratan/') . $row->id_loker ?>"><i class="fa fa-check"></i> Publish</a>
                                                    <?php } else { ?>
                                                        <a class="btn btn-secondary" href="<?php echo site_url('admin/loker_persyaratan/') . $row->id_loker ?>"><i class="fa fa-times"></i> Unpublish</a>
                                                    <?php } ?>
                                                    | <a class="btn btn-danger" href="<?php echo site_url('admin/deleteVacancy/' . $row->id_loker) ?>"><i class="fa fa-trash"></i></a>
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
                <h3 class="modal-title">Tambah Magang</h3>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo site_url('admin/addMagang') ?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col col-lg-12">
                            <div class="form-group">
                                <label>Perusahaan / Instansi</label>
                                <input type="text" class="form-control" name="nama_perusahaan" placeholder="ex :  Institut Teknologi Nasional" required="">
                            </div>
                            <div class="form-group">
                                <label>Logo Perusahaan</label>
                                <input type="file" class="dropify" height="100" name="logo" data-max-file-size="1M" data-allowed-file-extensions="jpg png">
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
                                <label>Jabatan / Posisi yang dibutuhkan</label>
                                <input type="text" class="form-control" name="posisi" placeholder="ex : Engineering Staff, Environment Staff, etc">
                            </div>
                            <div class="form-group">
                                <label>Deadline</label>
                                <input type="date" class="form-control" name="deadline" placeholder="etc : 28/04/2020">
                            </div>
                            <div class="form-group">
                                <label>Lokasi Magang</label>
                                <input type="text" class="form-control" name="lokasi" placeholder="ex : Jakarta, Bandung, atau alamat">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Magang</label>
                                <textarea name="deskripsi" id="deskripsi" placeholder="Deskripsikan tentang Magang" class="form-control"></textarea>
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
                                <label>File Poster</label>
                                <input type="file" class="dropify" height="100" name="poster" data-max-file-size="1M" data-allowed-file-extensions="jpg png" required>
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
foreach ($loker as $row) {
?>
    <div id="editModal<?= $row->id_loker ?>" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Edit Magang</h3>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo site_url('admin/editVacancy/') . $row->id_loker ?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col col-lg-12">
                                <div class="form-group">
                                    <label>Posisi / jabatan yang dibutuhkan</label>
                                    <input type="text" class="form-control" name="posisi" value="<?php echo $row->posisi ?>" placeholder="ex : Engineering Staff, Environment Staff, etc" required="">
                                </div>
                                <div class="form-group">
                                    <label>Deadline</label>
                                    <input type="date" class="form-control" name="deadline" value="<?php echo strftime('%Y-%m-%d', strtotime($row->deadline)) ?>" placeholder="etc : 28/04/2020" required="">
                                </div>
                                <div class="form-group">
                                    <label>Lokasi Magang</label>
                                    <input type="text" class="form-control" name="lokasi" value="<?php echo $row->lokasi ?>" placeholder="ex : Jakarta, Bandung, atau alamat" required="">
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi Magang</label>
                                    <textarea name="deskripsi" id="deskripsi" placeholder="Deskripsikan tentang Magang" class="form-control"><?php echo $row->deskripsi ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Syarat/Requirements</label>
                                    <textarea name="syarat" id="syarat" class="editor"><?php echo $row->syarat ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Informasi</label>
                                    <textarea name="informasi" id="info" class="editor"><?php echo $row->informasi ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>File Poster</label>
                                    <input type="file" class="dropify" height="100" name="poster" required="" data-max-file-size="1M" data-default-file="<?php echo site_url() ?>assets/upload/poster/<?= $row->poster ?>" data-allowed-file-extensions="jpg png">
                                </div>
                                <div class="form-group">
                                    <label>Progam studi yang dicari</label>
                                    <input type="text" class="form-control" name="prodi" required="">
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