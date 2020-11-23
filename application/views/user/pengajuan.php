<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Pengajuan Lamaran</h3>
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
                                            <th>Posisi yang dibutuhkan</th>
                                            <th>Status</th>
                                            <th width="20%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($pengajuan as $row) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $row->nama_perusahaan ?></td>
                                                <td><?php echo $row->posisi ?></td>
                                                <td>
                                                    <center>
                                                        <?php if (($row->status == "Ditolak") || ($row->status == "Pelamar Menolak")) { ?>
                                                            <span class="badge badge-danger"><?php echo $row->status ?></span>
                                                        <?php } else { ?>
                                                            <span class="badge badge-info"><?php echo $row->status ?></span>
                                                        <?php } ?>
                                                    </center>
                                                </td>
                                                <td>
                                                    <center>
                                                        <?php if (($row->status == "Diterima")) { ?>
                                                            <a class="btn btn-success btn-sm beforeTerima" href="<?php echo site_url('user/terima_lamaran/' . $row->id_lamaran) ?>"><i class="fa fa-check"></i> Terima</a> |
                                                            <a class="btn btn-danger btn-sm beforeTolak" href="<?php echo site_url('user/tolak_lamaran/' . $row->id_lamaran) ?>"><i class="fa fa-times"></i> Tolak</a>
                                                        <?php } else { ?>
                                                            <span class="badge badge-info">Nothing Action</span>
                                                        <?php } ?>
                                                    </center>
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