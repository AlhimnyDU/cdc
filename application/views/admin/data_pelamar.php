<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Data Pribadi Akun</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Data Pelamar <small><?php echo $akun->nama ?></small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div>
                            <form action="<?php echo site_url('user/identitasDiri') ?>" method="post" enctype="multipart/form-data">
                                <span class="section">1. Identitas Diri</span>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Lengkap<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="nama" value="<?php echo $akun->nama ?>" required="required" disabled>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Agama<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <select name="agama" class="form-control" required disabled>
                                            <option value="" selected disabled hidden>Pilih..</option>
                                            <option <?php if ($akun->agama == "Islam") {
                                                        echo "selected";
                                                    } ?> value="Islam">Islam</option>
                                            <option <?php if ($akun->agama == "Protestan") {
                                                        echo "selected";
                                                    } ?> value="Protestan">Protestan</option>
                                            <option <?php if ($akun->agama == "Katolik") {
                                                        echo "selected";
                                                    } ?> value="Katolik">Katolik</option>
                                            <option <?php if ($akun->agama == "Hindu") {
                                                        echo "selected";
                                                    } ?> value="Hindu">Hindu</option>
                                            <option <?php if ($akun->agama == "Buddha") {
                                                        echo "selected";
                                                    } ?> value="Buddha">Buddha</option>
                                            <option <?php if ($akun->agama == "Khonghucu") {
                                                        echo "selected";
                                                    } ?> value="Khonghucu">Khonghucu</option>
                                            <option <?php if ($akun->agama == "Lainnya") {
                                                        echo "selected";
                                                    } ?> value="Lainnya">Lainnya</option>
                                        </select></div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Jenis Kelamin<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <select name="jenis_kelamin" class="form-control" required disabled>
                                            <option value="" selected disabled hidden>Pilih..</option>
                                            <option <?php if ($akun->jenis_kelamin == "Pria") {
                                                        echo "selected";
                                                    } ?> value="Pria">Pria</option>
                                            <option <?php if ($akun->jenis_kelamin == "Wanita") {
                                                        echo "selected";
                                                    } ?>value="Wanita">Wanita</option>
                                        </select></div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Tempat Lahir<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" value="<?php echo $akun->tempat_lahir ?>" name="tempat_lahir" type="text" required disabled></div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Tanggal Lahir<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="tanggal_lahir" type="date" value="<?php echo $akun->tanggal_lahir ?>" required disabled></div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Email<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control " name="email" required="required" value="<?php echo $akun->email ?>" type="text" disabled></div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Nomor Handphone<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control telp" id="telp" name="telp" required="required" value="<?php echo $akun->telp ?>" type="text" disabled></div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Alamat Tinggal<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea class="form-control" rows="3" required="required" name="alamat" disabled><?php echo $akun->alamat ?></textarea></div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Desa / Kelurahan<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="desa_kelurahan" value="<?php echo $akun->desa_kelurahan ?>" required="required" type="text" disabled></div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Kecamatan<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="kecamatan" value="<?php echo $akun->kecamatan ?>" required="required" type="text" disabled></div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Kota / Kabupaten<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="kota_kabupaten" value="<?php echo $akun->kota_kabupaten ?>" required="required" type="text" disabled></div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Provinsi<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="provinsi" value="<?php echo $akun->provinsi ?>" required="required" type="text" disabled></div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Kode Pos<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="kode_pos" value="<?php echo $akun->kode_pos ?>" required="required" type="text" disabled></div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Pas Foto</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="file" class="dropify" height="50" name="pas_foto" data-max-file-size="2M" data-default-file="<?php echo base_url('assets/upload/pas_foto/' . $akun->pas_foto) ?>" data-allowed-file-extensions="png jpg jpeg" disabled></div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="x_content">
                        <div style="padding-top:10px">
                            <span class="section">2. Riwayat Pendidikan</span>
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table id="" class="table table-striped table-bordered datatable2" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th>Jenjang Pendidikan</th>
                                                <th>Nama Sekolah / Institusi</th>
                                                <th>Program Studi / Jurusan</th>
                                                <th width="15%">Tahun Lulus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($pendidikan as $row) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $no ?></td>
                                                    <td><?php echo $row->jenjang_pendidikan ?></td>
                                                    <td><?php echo $row->tempat_pendidikan ?></td>
                                                    <td><?php echo $row->jurusan ?></td>
                                                    <td><?php echo $row->tahun_lulus ?></td>
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
                    <div class="x_content">
                        <div style="margin-top:20px">
                            <span class="section">3. Riwayat Pengalaman Organisasi</span>
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table id="" class="table table-striped table-bordered datatable2" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th>Nama Organisasi</th>
                                                <th>Jabatan</th>
                                                <th width="15%">Tahun Aktif</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($organisasi as $row) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $no ?></td>
                                                    <td><?php echo $row->nama_organisasi ?></td>
                                                    <td><?php echo $row->jabatan ?></td>
                                                    <td><?php echo $row->tahun_aktif ?></td>
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
                    <div class="x_content">
                        <div style="margin-top:20px">
                            <span class="section">4. Riwayat Prestasi</span>
                            <div class="col-sm-12">
                                <p style="margin-left:15px;">Pada tabel ini anda dapat mengisikan prestasi seperti juara perlombaan, beasiswa, dan prestasi lainnya sebagai portofolio anda</p>
                                <div class="card-box table-responsive">
                                    <table id="" class="table table-striped table-bordered datatable2" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th>Nama Prestasi</th>
                                                <th width="15%">Bukti Prestasi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($prestasi as $row) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $no ?></td>
                                                    <td><?php echo $row->nama_prestasi ?></td>
                                                    <td>
                                                        <center><a href="<?php echo base_url('assets/upload/prestasi/' . $row->file) ?>" class="btn btn-outline-info btn-sm"><i class="fa fa-eye"></i> Lihat</a></center>
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
                    <div class="x_content">
                        <div style="margin-top:20px">
                            <span class="section">5. Sertifikat Keahlian</span>
                            <div class="col-sm-12">
                                <p style="margin-left:15px;">Pada tabel ini anda dapat mengisikan sertifikat yang anda miliki seperti TOEFL/IELTS, Psikotest ,Sertifikat Pelatihan, dan Sertifikat keahlian sesuai dengan bidang anda sebagai penunjang dari keahlian anda.</p>
                                <div class="card-box table-responsive">
                                    <table id="" class="table table-striped table-bordered datatable2" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th>Nama Sertifikat</th>
                                                <th width="15%">Bukti Sertifikat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($sertifikat as $row) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $no ?></td>
                                                    <td><?php echo $row->nama_sertifikat ?></td>
                                                    <td>
                                                        <center><a href="<?php echo base_url('assets/upload/sertifikat/' . $row->file) ?>" class="btn btn-outline-info btn-sm"><i class="fa fa-eye"></i> Lihat</a></center>
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
</div>