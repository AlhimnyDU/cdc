<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Persyaratan untuk di upload pada website</h3>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <a class="btn btn-success" href="" data-toggle="modal" data-target="#tambahModal"><i class="fa fa-plus"></i> Tambah Persyaratan</a>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <h5><?php echo $loker->posisi ?></h5>
                                <p> Berikut ini adalah pengaturan untuk persyaratan - persyaratan yang harus diupload oleh pendaftar pada magang ini</p>
                                <table id="" class="table table-striped table-bordered datatable" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th>Persyaratan</th>
                                            <th width="25%">Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($persyaratan as $row) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $row->nama_syarat ?></td>
                                                <td>
                                                    <a class="btn btn-danger" href="<?php echo site_url('admin/deletePersyaratan/' . $row->id_syarat) ?>"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php
                                            $no++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <br>
                                <br>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="x_title">
                    <label style="color: red;">Tekan button ini untuk pengaturan publish magang :</label>
                    <?php if ($loker->status == "Menunggu Konfirmasi") { ?>
                        <a class="btn btn-sm btn-primary" href="<?php echo site_url('admin/accLoker/') . $loker->id_loker ?>"><i class="fa fa-check"></i> Publish</a>
                    <?php } else { ?>
                        <a class="btn btn-sm btn-secondary" href="<?php echo site_url('admin/unpublishLoker/') . $loker->id_loker ?>"><i class="fa fa-times"></i> Unpublish</a>
                    <?php } ?>
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
                <h3 class="modal-title">Tambah Persyaratan</h3>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo site_url('admin/addPersyaratan/' . $loker->id_loker) ?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col col-lg-12">
                            <div class="form-group">
                                <label>Nama Persyaratan untuk di upload di website</label>
                                <br>
                                <select name="id_persyaratan" class="syarat_select form-control" style="width: 100%;" required>
                                    <option value="" hidden selected disabled>Cari Persyaratan..</option>
                                    <?php
                                    foreach ($syarat as $row) {
                                    ?>
                                        <option value=" <?php echo $row->id_persyaratan ?>"><?php echo $row->nama_syarat ?></option>
                                    <?php } ?>
                                </select>
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