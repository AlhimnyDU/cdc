<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Form Pendaftaran Peserta Acara / Seminar / Webinar</h3>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <a class="btn btn-success" href="" data-toggle="modal" data-target="#tambahModal"><i class="fa fa-plus"></i> Tambah Acara</a>
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
                                            <th width="15%">Tanggal Pelaksanaan</th>
                                            <th width="18%">Pengaktifan Kuesioner</th>
                                            <th align="center">Aksi</th>
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
                                                <td><?php echo date("d F Y", strtotime($row->tanggal_pelaksanaan)) ?></td>
                                                <td align="center">
                                                    <?php if ($row->status == "Aktif") { ?>
                                                        <a class="btn btn-secondary btn-sm" href="<?php echo site_url('admin/akhiriKuesioner/') . $row->id_acara ?>">Nonaktifkan</a>
                                                    <?php } else if ($row->status == "Tidak Aktif") { ?>
                                                        <a class="btn btn-primary btn-sm" href="<?php echo site_url('admin/mulaiKuesioner/') . $row->id_acara ?>">Aktifkan</a>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm" href="<?php echo site_url('halaman/daftar/') . $row->id_acara ?>"><i class="fa fa-link"></i> Link Form</a> |
                                                    <a class="btn btn-warning btn-sm" href="<?php echo site_url('admin/form/') . $row->id_acara ?>"><i class="fa fa-question"></i> Pertanyaan</a> |
                                                    <!-- <a class="btn btn-danger btn-sm" href="<?php echo site_url('admin/deleteAcara/') . $row->id_acara ?>"><i class="fa fa-trash"></i>Edit</a> | -->
                                                    <a class="btn btn-info btn-sm" href="<?php echo site_url('admin/responden/') . $row->id_acara ?>"><i class="fa fa-user"></i>Responden</a>
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
                <form method="post" action="<?php echo site_url('admin/addAcara') ?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col col-lg-12">
                            <div class="form-group">
                                <label>Nama Acara</label>
                                <input type="text" class="form-control" name="nama_acara" placeholder="Nama Acara" required="">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Pelaksanaan</label>
                                <input type="date" class="form-control" name="tanggal_pelaksanaan" required="">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary pull-right" value="Tambah" name="submit">Submit
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>