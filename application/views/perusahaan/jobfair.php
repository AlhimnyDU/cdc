<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Job Fair</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group row pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Job Fair Online</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- Smart Wizard -->
                        <p>Acara Job Fair Online akan berlangsung dengan tahapan berikut ini</p>
                        <div id="wizard" class="form_wizard wizard_horizontal">
                            <ul class="wizard_steps anchor">
                                <li>
                                    <a href="#step-1" class="selected" isdone="1" rel="1">
                                        <span class="step_no">1</span>
                                        <span class="step_descr">
                                            Step 1<br>
                                            <small>Step 1 Pendaftaran Perusahaan (s/d 31 Maret 2021)</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-2" class="selected" isdone="0" rel="2">
                                        <span class="step_no">2</span>
                                        <span class="step_descr">
                                            Step 2<br>
                                            <small>Step 2 Verifikasi oleh admin (s/d 31 Maret 2021)</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-3" class="selected" isdone="0" rel="3">
                                        <span class="step_no">3</span>
                                        <span class="step_descr">
                                            Step 3<br>
                                            <small>Step 3 Pelaksanaan Virtual Job Fair 5 - 9 April 2021</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-4" class="selected" isdone="0" rel="4">
                                        <span class="step_no">4</span>
                                        <span class="step_descr">
                                            Step 4<br>
                                            <small>Step 4 Posting lowongan pekerjaan yang akan dipost dihalaman website CDC Job Fair Itenas 2021</small>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        Acara
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table class="table table-striped table-bordered datatable" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th>Nama Event</th>
                                                <th width="15%">Tanggal Awal</th>
                                                <th width="15%">Tanggal Akhir</th>
                                                <th width="8%">Status</th>
                                                <th width="15%">Edit</th>
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
                                                        <center>
                                                            <?php
                                                            if (!empty($mengikuti)) {
                                                                foreach ($mengikuti as $r) {
                                                                    if ($row->id_event == $r->id_event) { ?>
                                                                        <span class="badge badge-primary">Mengikuti</span>
                                                                <?php
                                                                    } else {
                                                                        echo "<span class='badge badge-danger'>Tidak Mengikuti</span>";
                                                                    }
                                                                }
                                                            } else {
                                                                ?>
                                                                <span class="badge badge-danger">Tidak Mengikuti</span>
                                                            <?php
                                                            }
                                                            ?>
                                                        </center>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if (date('Y-m-d') > $row->tanggal_akhir) {
                                                        ?>
                                                            <a class="btn btn-secondary btn-sm" href="#" disabled>Acara telah selesai</a>
                                                            <?php } else {
                                                            if (!empty($mengikuti)) {
                                                                foreach ($mengikuti as $r) {
                                                                    if ($row->id_event == $r->id_event) { ?>
                                                                        <a class="btn btn-primary btn-sm disabled" href="#" disabled>Acara Sedang Berlangsung</a> <?php
                                                                                                                                                                }
                                                                                                                                                            }
                                                                                                                                                        } else {
                                                                                                                                                                    ?>
                                                                <a class="btn btn-success btn-sm" href="#" data-toggle="modal" data-target="#mengikutiModal<?php echo $row->id_event ?>"><i class="fa fa-check"></i> Mengikuti</a>
                                                        <?php
                                                                                                                                                        }
                                                                                                                                                    }
                                                        ?>
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
        <?php if ($mengikuti) { ?>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <a class="btn btn-success" href="" data-toggle="modal" data-target="#tambahModal"><i class="fa fa-plus"></i> Tambah Loker Job Fair</a>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box table-responsive">
                                        <table class="table table-striped table-bordered datatable" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th width="5%">No</th>
                                                    <th>Jabatan/Posisi</th>
                                                    <th>Status Loker</th>
                                                    <th width="28%">Aksi</th>
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
                                                        <td><?php echo $row->status ?></td>
                                                        <td>
                                                            <a class="btn btn-info btn-sm" href="<?php echo site_url('perusahaan/pelamar/' . $row->id_loker) ?>"><i class="fa fa-users"></i> Pelamar</a> |
                                                            <a class="btn btn-warning btn-sm" href="" data-toggle="modal" data-target="#editModal<?= $row->id_loker ?>"><i class="fa fa-edit"></i> Edit</a> |
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
        <?php } ?>
    </div>
</div>
<!-- /page content -->
<div id="tambahModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Tambah Lowongan Pekerjaan Job Fair</h3>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo site_url('perusahaan/addJobfair') ?>" enctype="multipart/form-data">
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
                                <input type="file" class="dropify" height="100" name="poster" data-max-file-size="1M" data-allowed-file-extensions="jpg">
                            </div>
                            <div class="form-group">
                                <label>Program studi yang dicari</label>
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
                    <form method="post" action="<?php echo site_url('perusahaan/editJobfair/' . $row->id_loker)  ?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col col-lg-12">
                                <div class="col col-lg-12">
                                    <div class="form-group">
                                        <label>Posisi / jabatan yang dibutuhkan</label>
                                        <input type="text" class="form-control" value="<?php echo $row->posisi ?>" name="posisi" placeholder="ex : Engineering Staff, Environment Staff, etc" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Deadline</label>
                                        <input type="date" class="form-control" value="<?php echo date("Y-m-d", strtotime($row->deadline)) ?>" name="deadline" placeholder="etc : 28/04/2020" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Lokasi Perkerjaan</label>
                                        <input type="text" class="form-control" value="<?php echo $row->lokasi ?>" name="lokasi" placeholder="ex : Jakarta, Bandung, atau alamat" required="">
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
                                        <small style="color:red">*Bila tidak diperlukan, dapat dikosongkan</small>
                                        <input type="file" class="dropify" height="100" name="poster" data-max-file-size="1M" data-allowed-file-extensions="jpg" data-default-file="<?php echo site_url('assets/upload/poster/') . $row->poster ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Program studi yang dicari</label>
                                        <small style="color:red">*Bila tidak diperlukan, dapat dikosongkan</small>
                                        <input type="text" class="form-control" value="<?php echo $row->prodi ?>" placeholder="ex : Informatika, Teknik Mesin, Teknik Sipil, Desain Interior, etc" name="prodi">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary pull-right" value="Tambah" name="submit">Update</button>
                                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- /page content -->
<?php
foreach ($event as $row) {
?>
    <div id="mengikutiModal<?= $row->id_event ?>" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title"><?= $row->nama_event ?></h3>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo site_url('perusahaan/mengikuti/') . $row->id_event ?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col col-lg-12">
                                <div class="form-group">
                                    Dengan mengikuti acara ini, maka perusahaan harus menyetujui peraturan dan ketentuan yang berlaku pada acara ini.
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="" required> <small>Centang untuk menyetujui prosedur dan ketentuan</small>
                                        </label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary pull-right" value="Tambah" name="submit">Ok</button>
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
<?php foreach ($mengikuti as $r) { ?>
    <div id="videoModal<?php echo $r->id ?>" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Masukkan Link Youtube Video</h3>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo site_url('perusahaan/linkVideo/') . $r->id ?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col col-lg-12">
                                <div class="col col-lg-12">
                                    <div class="form-group">
                                        <label>Masukkan Link Video</label>
                                        <p><small style="color:red">*upload video pengenalan ke youtube, masukkan alamat link video youtube dibawah</small></p>
                                        <input type="text" class="form-control" value="<?php echo $r->link ?>" name="link">
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