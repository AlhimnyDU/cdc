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
                                                    <?php
                                                    $today = date("Y-m-d");
                                                    if ($today <= $row->deadline) { ?>
                                                        <?php if ((($this->session->userdata('user') == "mahasiswa") || ($this->session->userdata('user') == "alumni") || ($this->session->userdata('user') == "umum")) && ($row->jenis == 'jobfair') && ($this->session->userdata('mengikuti'))) { ?>
                                                            <a class="btn btn-info buttonSubmit" href="<?php echo site_url("user/ajukan/" . $row->id_loker) ?>">Apply job here</a>
                                                        <?php } else if ((($this->session->userdata('user') == "mahasiswa") || ($this->session->userdata('user') == "alumni") || ($this->session->userdata('user') == "umum")) && ($row->jenis == 'jobfair') && (empty($this->session->userdata('mengikuti')))) { ?>
                                                            <a class="btn btn-info buttonSubmit" href="<?php echo site_url("user") ?>">Harus mendaftar mengikuti job fair terlebih dahulu</a>
                                                        <?php } else if ((($this->session->userdata('user') == "mahasiswa") || ($this->session->userdata('user') == "alumni") || ($this->session->userdata('user') == "umum")) && ($row->jenis == 'vacancy')) { ?>
                                                            <a class="btn btn-info buttonSubmit" href="<?php echo site_url("user/ajukan/" . $row->id_loker) ?>">Apply job here</a>
                                                        <?php } else { ?>
                                                            <a class="btn btn-info disabled" href="#">Apply job here</a> | <a class="btn btn-info" href="<?php echo site_url("login") ?>">Login</a> <br>
                                                            <small style="color:red;">*Login required for user only</small>
                                                        <?php } ?>
                                                    <?php } else { ?>
                                                        <a class="btn btn-danger disabled" href="#">Telah Melewati Batas Waktu</a>
                                                    <?php } ?>
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