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
                                            <th>Posisi yang dibutuhkan</th>
                                            <th>Poster</th>
                                            <th>Status Loker</th>
                                            <th width="28%">Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($loker as $row) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $row->posisi ?></td>
                                                <td><img src="<?php echo site_url('/assets/upload/poster/') . $row->poster ?>" class="thumbnail"></td>
                                                <td><?php echo $row->status ?></td>
                                                <td>
                                                    <a class="btn btn-info btn-sm" href="<?php echo site_url('perusahaan/pelamar/' . $row->id_loker) ?>"><i class="fa fa-users"></i> Pelamar</a> |
                                                    <a class="btn btn-warning" href="" data-toggle="modal" data-target="#editModal<?= $row->id_loker ?>"><i class="fa fa-edit"></i> Edit</a> |
                                                    <a class="btn btn-danger btn-sm beforeDelete" href="<?php echo site_url('perusahaan/deleteJob/' . $row->id_loker) ?>"><i class="fa fa-trash"></i> Hapus</a>
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
                <form method="post" action="<?php echo site_url('perusahaan/addLoker') ?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col col-lg-12">
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
                                <label>File Poster</label>
                                <input type="file" class="dropify" height="100" name="poster" required="" data-max-file-size="1M" data-allowed-file-extensions="jpg">
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
                    <form method="post" action="<?php echo site_url('perusahaan/editLoker') ?>" enctype="multipart/form-data">
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
                                    <label>Lokasi Perkerjaan</label>
                                    <input type="text" class="form-control" name="lokasi" value="<?php echo $row->lokasi ?>" placeholder="ex : Jakarta, Bandung, atau alamat" required="">
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi Loker</label>
                                    <textarea name="deskripsi" id="deskripsi" placeholder="Deskripsikan tentang lowongan pekerjaan" class="form-control"><?php echo $row->deskripsi ?></textarea>
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
                                    <input type="file" class="dropify" height="100" name="poster" data-max-file-size="1M" data-default-file="<?php echo site_url() ?>assets/upload/poster/<?= $row->poster ?>" data-allowed-file-extensions="jpg png">
                                </div>
                                <div class="form-group">
                                    <label>Progam studi yang dicari</label>
                                    <input type="text" class="form-control" name="prodi">
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