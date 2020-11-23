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
                                            <th>Persyaratan</th>
                                            <th>Poster</th>
                                            <th width="20%">Pengajuan</th>
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
                                                <!-- <td><?php echo $row->judul ?></td> -->
                                                <td><?php echo $row->posisi ?></td>
                                                <td><?php echo $row->syarat ?></td>
                                                <td><img src="<?php echo site_url('/assets/upload/poster/') . $row->poster ?>" alt="" class="thumbnail"></td>
                                                <td>
                                                    <a href="<?php echo site_url('user/ajukan/' . $row->id_loker) ?>" class="btn btn-warning beforeAjukan"><i class="fa fa-edit"></i>Ajukan Lamaran</a>
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