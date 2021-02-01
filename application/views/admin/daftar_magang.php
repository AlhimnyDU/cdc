<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Pengajuan Magang</h3>
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
                                            <th>Nama</th>
                                            <th>NIM</th>
                                            <th>Jenjang</th>
                                            <th>Jurusan</th>
                                            <th>IPK</th>
                                            <th>No Handphone</th>
                                            <th>Email</th>
                                            <th>Keahlian</th>
                                            <th>Pakta Integritas</th>
                                            <th>Aksi</>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($pelamar as $row) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $row->nama ?></td>
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
                                                    <a class="btn btn-info btn-sm" href="<?php echo site_url('admin/data_pelamar/' . $row->id_akun) ?>"><i class="fa fa-user"></i> Data Pelamar</a>
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