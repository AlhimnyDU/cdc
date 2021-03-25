<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Pendaftar Jobfair April 2021</h3>
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
                                            <th>Nama PIC</th>
                                            <th>Email Perusahaan</th>
                                            <th>Telepon Perusahaan</th>
                                            <th>Telepon PIC</th>
                                            <th>Status</th>
                                            <th>Paket</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($peserta as $row) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $row->nama_perusahaan ?></td>
                                                <td><?php echo $row->nama_pic ?></td>
                                                <td><?php echo $row->email ?></td>
                                                <td><?php echo $row->telp_perusahaan ?></td>
                                                <td><?php echo $row->cp ?></td>
                                                <td><?php echo $row->status ?></td>
                                                <td>
                                                    <?php echo $row->paket ?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-info btn-sm" href="<?php echo site_url('assets/upload/pernyataan/' . $row->logo) ?>"><i class="fa fa-gallery"></i> Logo Perusahaan</a>
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