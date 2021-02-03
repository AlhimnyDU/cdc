<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Pendaftar Magang</h3>
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
                                <table id="" class="table table-striped table-bordered datatable2" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th>Perguruaan Tinggi</th>
                                            <th>Kota</th>
                                            <th>Provinsi</th>
                                            <th>NIM</th>
                                            <th>Nama Pendaftar</th>
                                            <th>Semester</th>
                                            <th>Fakultas</th>
                                            <th>Jenjang S1</th>
                                            <th>Program Studi</th>
                                            <th>IPK</th>
                                            <th>No HP</th>
                                            <th>Email</th>
                                            <th>Keahlian</th>
                                            <th>Surat Pernyataan</th>
                                            <th>Transkrip Nilai</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($pendaftar as $row) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $row->universitas ?></td>
                                                <td><?php echo $row->kota_kabupaten ?></td>
                                                <td><?php echo $row->provinsi ?></td>
                                                <td><?php echo $row->nomor_induk ?></td>
                                                <td><?php echo $row->nama ?></td>
                                                <td><?php echo $row->semester ?></td>
                                                <td><?php echo $row->fakultas ?></td>
                                                <td>S1</td>
                                                <td><?php echo $row->prodi ?></td>
                                                <td><?php echo $row->ipk ?></td>
                                                <td><?php echo $row->no_hp ?></td>
                                                <td><?php echo $row->email ?></td>
                                                <td><?php echo $row->keahlian ?></td>
                                                <td>Ada</td>
                                                <td>Ada</td>
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