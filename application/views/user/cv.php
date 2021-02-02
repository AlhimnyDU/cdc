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
                        <h2>Data Personal <small><?php echo $this->session->userdata('nama') ?></small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div>
                            <form action="<?php echo site_url('user/identitasDiri') ?>" method="post" enctype="multipart/form-data">
                                <span class="section">1. Identitas Diri</span>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Lengkap<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="nama" value="<?php echo $akun->nama ?>" required="required">
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Agama<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <select name="agama" class="form-control" required>
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
                                        </select>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Jenis Kelamin<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <select name="jenis_kelamin" class="form-control" required>
                                            <option value="" selected disabled hidden>Pilih..</option>
                                            <option <?php if ($akun->jenis_kelamin == "Pria") {
                                                        echo "selected";
                                                    } ?> value="Pria">Pria</option>
                                            <option <?php if ($akun->jenis_kelamin == "Wanita") {
                                                        echo "selected";
                                                    } ?> value="Wanita">Wanita</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Tempat Lahir<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" value="<?php echo $akun->tempat_lahir ?>" name="tempat_lahir" type="text" required>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Tanggal Lahir<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="tanggal_lahir" type="date" value="<?php echo $akun->tanggal_lahir ?>" required>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Email<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control " name="email" required="required" value="<?php echo $akun->email ?>" type="text">
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Nomor Handphone<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control telp" id="telp" name="telp" required="required" value="<?php echo $akun->telp ?>" type="text">
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Alamat Tinggal<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea class="form-control" rows="3" required="required" name="alamat"><?php echo $akun->alamat ?></textarea>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Desa / Kelurahan<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="desa_kelurahan" value="<?php echo $akun->desa_kelurahan ?>" required="required" type="text">
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Kecamatan<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="kecamatan" value="<?php echo $akun->kecamatan ?>" required="required" type="text">
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Kota / Kabupaten<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="kota_kabupaten" value="<?php echo $akun->kota_kabupaten ?>" required="required" type="text">
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Provinsi<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="provinsi" value="<?php echo $akun->provinsi ?>" required="required" type="text">
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Kode Pos<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="kode_pos" value="<?php echo $akun->kode_pos ?>" required="required" type="text">
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Pas Foto</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="file" class="dropify" height="50" name="pas_foto" data-max-file-size="2M" data-default-file="<?php echo base_url('assets/upload/pas_foto/' . $akun->pas_foto) ?>" data-allowed-file-extensions="png jpg jpeg">
                                    </div>
                                </div>
                                <span class="section">2. Data Akademik</span>
                                <?php if (($akun->role == "mahasiswa") || ($akun->role == "alumni")) { ?>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align">NIM / NRP<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <input class="form-control" name="nomor_induk" value="<?php echo $akun->nomor_induk ?>" required="required" type="number">
                                        </div>
                                    </div>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align">Perguruan Tinggi<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <input class="form-control" name="universitas" value="Institut Teknologi Nasional Bandung" readonly>
                                        </div>
                                    </div>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align">Fakultas<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <select class="custom-select" name="fakultas" required>
                                                <option value="" disabled hidden selected>Pilih</option>
                                                <option value="Fakultas Teknologi Industri" <?php if ($akun->fakultas == "Fakultas Teknologi Industri") {
                                                                                                echo "selected";
                                                                                            } ?>>
                                                    Fakultas Teknologi Industri
                                                </option>
                                                <option value="Fakultas Teknik Sipil dan Perencanaan" <?php if ($akun->fakultas == "Fakultas Teknik Sipil dan Perencanaan") {
                                                                                                            echo "selected";
                                                                                                        } ?>>
                                                    Fakultas Teknik Sipil dan Perencanaan
                                                </option>
                                                <option value="Fakultas Arsitektur dan Desain" <?php if ($akun->fakultas == "Fakultas Arsitektur dan Desain") {
                                                                                                    echo "selected";
                                                                                                } ?>>
                                                    Fakultas Arsitektur dan Desain
                                                </option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align">Program Studi<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <select class="custom-select" name="prodi" required>
                                                <option value="" disabled hidden selected>Pilih</option>
                                                <option value="Teknik Elektro" <?php if ($akun->prodi == "Teknik Elektro") {
                                                                                    echo "selected";
                                                                                } ?>>
                                                    Teknik Elektro
                                                </option>
                                                <option value="Teknik Mesin" <?php if ($akun->prodi == "Teknik Mesin") {
                                                                                    echo "selected";
                                                                                } ?>>
                                                    Teknik Mesin
                                                </option>
                                                <option value="Teknik Industri" <?php if ($akun->prodi == "Teknik Industri") {
                                                                                    echo "selected";
                                                                                } ?>>
                                                    Teknik Industri
                                                </option>
                                                <option value="Teknik Kimia" <?php if ($akun->prodi == "Teknik Kimia") {
                                                                                    echo "selected";
                                                                                } ?>>
                                                    Teknik Kimia
                                                </option>
                                                <option value="Informatika" <?php if ($akun->prodi == "Informatika") {
                                                                                echo "selected";
                                                                            } ?>>
                                                    Informatika
                                                </option>
                                                <option value="Sistem Informasi" <?php if ($akun->prodi == "Sistem Informasi") {
                                                                                        echo "selected";
                                                                                    } ?>>
                                                    Sistem Informasi
                                                </option>
                                                <option value="Teknik Sipil" <?php if ($akun->prodi == "Teknik Sipil") {
                                                                                    echo "selected";
                                                                                } ?>>
                                                    Teknik Sipil
                                                </option>
                                                <option value="Teknik Geodesi" <?php if ($akun->prodi == "Teknik Geodesi") {
                                                                                    echo "selected";
                                                                                } ?>>
                                                    Teknik Geodesi
                                                </option>
                                                <option value="Perencanaan Wilayah dan Kota" <?php if ($akun->prodi == "Perencanaan Wilayah dan Kota") {
                                                                                                    echo "selected";
                                                                                                } ?>>
                                                    Perencanaan Wilayah dan Kota
                                                </option>
                                                <option value="Teknik Lingkungan" <?php if ($akun->prodi == "Teknik Lingkungan") {
                                                                                        echo "selected";
                                                                                    } ?>>
                                                    Teknik Lingkungan
                                                </option>
                                                <option value="Arsitektur" <?php if ($akun->prodi == "Arsitektur") {
                                                                                echo "selected";
                                                                            } ?>>
                                                    Arsitektur
                                                </option>
                                                <option value="Desain Interior" <?php if ($akun->prodi == "Desain Interior") {
                                                                                    echo "selected";
                                                                                } ?>>
                                                    Desain Interior
                                                </option>
                                                <option value="Desain Produk" <?php if ($akun->prodi == "Desain Produk") {
                                                                                    echo "selected";
                                                                                } ?>>
                                                    Desain Produk
                                                </option>
                                                <option value="Desain Komunikasi dan Visual" <?php if ($akun->prodi == "Desain Komunikasi dan Visual") {
                                                                                                    echo "selected";
                                                                                                } ?>>
                                                    Desain Komunikasi dan Visual
                                                </option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align">Nilai IPK Terakhir<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <input type="text" class="form-control ipk" name="ipk" value="<?php echo $akun->ipk ?>" required>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align">NIM / NRP<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <input class="form-control" name="nomor_induk" value="<?php echo $akun->nomor_induk ?>" required="required" type="number">
                                        </div>
                                    </div>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align">Perguruan Tinggi<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <input class="form-control" name="universitas" value="Universitas Teknologi Nasional Bandung" required>
                                        </div>
                                    </div>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align">Fakultas<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <input class="form-control" name="fakultas" value="<?php echo $akun->fakultas ?>" required>
                                        </div>
                                    </div>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align">Program Studi<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <input class="form-control" name="prodi" value="<?php echo $akun->prodi ?>" required>
                                        </div>
                                    </div>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align">Nilai IPK Terakhir<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <input class="form-control ipk" name="ipk" value="<?php echo $akun->ipk ?>" required>
                                        </div>
                                    </div>
                                <?php } ?>

                                <div class="form-group">
                                    <center>
                                        <div class="col-md-6 offset-md-3">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <button type="reset" class="btn btn-success">Reset</button>
                                        </div>
                                    </center>
                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="x_content">
                        <div style="margin-top:20px">
                            <span class="section">3. Berkas - Berkas</span>
                            <div class="col-sm-12">
                                <p style="margin-left:15px;">Pada tabel ini anda dapat mengisikan berkas yang anda miliki seperti Photocopy Ijazah Legalisir, Transkrip Nilai, TOEFL/IELTS, dan Hasil Psikotest</p>
                                <div class="card-box table-responsive">
                                    <table id="" class="table table-striped table-bordered datatable2" style="width:100%">
                                        <a href="#" class="btn btn-info" style="margin-left:15px;" data-toggle="modal" data-target="#tambahBrModal"><i class="fa fa-plus"></i> Tambah Berkas</a>
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th>Nama Berkas</th>
                                                <th width="15%">File Berkas</th>
                                                <th width="15%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($berkas as $row) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $no ?></td>
                                                    <td><?php echo $row->nama_berkas ?></td>
                                                    <td>
                                                        <center><a href="<?php echo base_url('assets/upload/berkas/' . $row->file) ?>" class="btn btn-outline-info btn-sm"><i class="fa fa-eye"></i> Lihat</a></center>
                                                    </td>
                                                    <td>
                                                        <center>
                                                            <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#editBrModal<?php echo $row->id_berkas ?>"><i class="fa fa-edit"></i> Edit</a>
                                                            <a href="<?php echo site_url('user/deleteBerkas/' . $row->id_berkas . '/' . $row->file) ?>" class="btn btn-danger btn-sm beforeDelete"><i class="fa fa-trash"></i> Hapus</a>
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
                    <div class="x_content">
                        <div style="padding-top:10px">
                            <span class="section">4. Riwayat Pendidikan</span>
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table id="" class="table table-striped table-bordered datatable2" style="width:100%">
                                        <a href="#" class="btn btn-success" style="margin-left:15px;" data-toggle="modal" data-target="#tambahPdModal"><i class="fa fa-plus"></i> Tambah Pendidikan</a>
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th>Jenjang Pendidikan</th>
                                                <th>Nama Sekolah / Institusi</th>
                                                <th>Program Studi / Jurusan</th>
                                                <th width="15%">Tahun Lulus</th>
                                                <th width="15%">Aksi</th>
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
                                                    <td>
                                                        <center>
                                                            <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#editPdModal<?php echo $row->id_pendidikan ?>"><i class="fa fa-edit"></i> Edit</a>
                                                            <a href="<?php echo site_url('user/deletePendidikan/' . $row->id_pendidikan) ?>" class="btn btn-danger btn-sm beforeDelete"><i class="fa fa-trash"></i> Hapus</a>
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
                    <div class="x_content">
                        <div style="margin-top:20px">
                            <span class="section">5. Riwayat Pengalaman Organisasi</span>
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table id="" class="table table-striped table-bordered datatable2" style="width:100%">
                                        <a href="#" class="btn btn-danger" style="margin-left:15px;" data-toggle="modal" data-target="#tambahOrModal"><i class="fa fa-plus"></i> Tambah Organisasi</a>
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th>Nama Organisasi</th>
                                                <th>Jabatan</th>
                                                <th width="15%">Tahun Aktif</th>
                                                <th width="15%">Aksi</th>
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
                                                    <td>
                                                        <center>
                                                            <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#editOrModal<?php echo $row->id_organisasi ?>"><i class="fa fa-edit"></i> Edit</a>
                                                            <a href="<?php echo site_url('user/deleteOrganisasi/' . $row->id_organisasi) ?>" class="btn btn-danger btn-sm beforeDelete"><i class="fa fa-trash"></i> Hapus</a>
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
                    <div class="x_content">
                        <div style="margin-top:20px">
                            <span class="section">6. Riwayat Prestasi</span>
                            <div class="col-sm-12">
                                <p style="margin-left:15px;">Pada tabel ini anda dapat mengisikan prestasi seperti juara perlombaan, beasiswa, dan prestasi lainnya sebagai portofolio anda</p>
                                <div class="card-box table-responsive">
                                    <table id="" class="table table-striped table-bordered datatable2" style="width:100%">
                                        <a href="#" class="btn btn-primary" style="margin-left:15px;" data-toggle="modal" data-target="#tambahPrModal"><i class="fa fa-plus"></i> Tambah Prestasi</a>
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th>Nama Prestasi</th>
                                                <th width="15%">Bukti Prestasi</th>
                                                <th width="15%">Aksi</th>
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
                                                    <td>
                                                        <center>
                                                            <a href="<?php echo site_url('user/deletePrestasi/' . $row->id_prestasi . '/' . $row->file) ?>" class="btn btn-danger btn-sm beforeDelete"><i class="fa fa-trash"></i> Hapus</a>
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
                    <div class="x_content">
                        <div style="margin-top:20px">
                            <span class="section">7. Sertifikat Keahlian</span>
                            <div class="col-sm-12">
                                <p style="margin-left:15px;">Pada tabel ini anda dapat mengisikan sertifikat yang anda miliki Sertifikat Pelatihan atau Sertifikat keahlian sesuai dengan bidang anda sebagai penunjang dari keahlian anda.</p>
                                <div class="card-box table-responsive">
                                    <table id="" class="table table-striped table-bordered datatable2" style="width:100%">
                                        <a href="#" class="btn btn-info" style="margin-left:15px;" data-toggle="modal" data-target="#tambahSrModal"><i class="fa fa-plus"></i> Tambah Sertifikat</a>
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th>Nama Sertifikat</th>
                                                <th width="15%">Bukti Sertifikat</th>
                                                <th width="15%">Aksi</th>
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
                                                    <td>
                                                        <center>
                                                            <a href="<?php echo site_url('user/deleteSertifikat/' . $row->id_sertifikat . '/' . $row->file) ?>" class="btn btn-danger btn-sm beforeDelete"><i class="fa fa-trash"></i> Hapus</a>
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
                    <div class="x_content">
                        <div style="margin-top:20px">
                            <span class="section">8. Riwayat Pengalaman Kerja</span>
                            <div class="col-sm-12">
                                <p style="margin-left:15px;">Pada tabel ini anda dapat mengisikan riwayat pengalaman kerja.</p>
                                <div class="card-box table-responsive">
                                    <table id="" class="table table-striped table-bordered datatable2" style="width:100%">
                                        <a href="#" class="btn btn-info" style="margin-left:15px;" data-toggle="modal" data-target="#tambahKrModal"><i class="fa fa-plus"></i> Tambah Pengalaman Kerja</a>
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th>Pengalaman Kerja</th>
                                                <th width="15%">Tahun</th>
                                                <th width="15%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($kerja as $row) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $no ?></td>
                                                    <td><?php echo $row->riwayat_kerja ?></td>
                                                    <td>
                                                        <?php echo $row->tahun ?>
                                                    </td>
                                                    <td>
                                                        <center>
                                                            <a href="<?php echo site_url('user/deleteKerja/' . $row->id_kerja) ?>" class="btn btn-danger btn-sm beforeDelete"><i class="fa fa-trash"></i> Hapus</a>
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
    <div id="tambahKrModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title"> Tambah Pengalaman Kerja </h3>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo site_url('user/addKerja/') ?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col col-lg-12">
                                <div class="form-group">
                                    <label>Riwayat Kerja</label>
                                    <input class="form-control" name="riwayat_kerja" required="required" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Tahun Kerja</label>
                                    <input class="form-control" name="tahun" type="number" required="required">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary pull-right" value="Tambah" name="submit">Ok</button>
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="tambahPdModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title"> Tambah Pendidikan </h3>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo site_url('user/addPendidikan/') ?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col col-lg-12">
                                <div class="form-group">
                                    <label>Jenjang Pendidikan</label>
                                    <select name="jenjang_pendidikan" class="form-control" required>
                                        <option value="" selected disabled hidden>Pilih..</option>
                                        <option value="Sekolah Dasar">Sekolah Dasar</option>
                                        <option value="Sekolah Menengah Pertama">Sekolah Menengah Pertama</option>
                                        <option value="Sekolah Menengah Atas / Sekolah Menengah Kejuruan">Sekolah Menengah Atas / Sekolah Menengah Kejuruan</option>
                                        <option value="Diploma I">Diploma I</option>
                                        <option value="Diploma II">Diploma II</option>
                                        <option value="Diploma III">Diploma III</option>
                                        <option value="Diploma IV">Diploma IV</option>
                                        <option value="Sarjana">Sarjana</option>
                                        <option value="Magister">Magister</option>
                                        <option value="Doktor">Doktor</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Institusi / Sekolah Pendidikan</label>
                                    <input class="form-control" name="tempat_pendidikan" required="required" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Program Studi / Jurusan</label>
                                    <input class="form-control" name="jurusan" type="text">
                                    <small>*Kosongkan saja untuk sekolah dasar dan sekolah menengah pertama</small>
                                </div>
                                <div class="form-group">
                                    <label>Tahun Lulus</label>
                                    <input class="form-control" name="tahun_lulus" type="number" required="required">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary pull-right" value="Tambah" name="submit">Ok</button>
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    foreach ($pendidikan as $row) {
    ?>
        <div id="editPdModal<?php echo $row->id_pendidikan ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title"> Edit Pendidikan </h3>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?php echo site_url('user/updatePendidikan/' . $row->id_pendidikan) ?>" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col col-lg-12">
                                    <div class="form-group">
                                        <label>Jenjang Pendidikan</label>
                                        <select name="jenjang_pendidikan" class="form-control" required>
                                            <option value="" selected disabled hidden>Pilih..</option>
                                            <option <?php if ($row->jenjang_pendidikan == "Sekolah Dasar") {
                                                        echo "selected";
                                                    } ?> value="Sekolah Dasar">Sekolah Dasar</option>
                                            <option <?php if ($row->jenjang_pendidikan == "Sekolah Menengah Pertama") {
                                                        echo "selected";
                                                    } ?> value="Sekolah Menengah Pertama">Sekolah Menengah Pertama</option>
                                            <option <?php if ($row->jenjang_pendidikan == "Sekolah Menengah Atas / Sekolah Menengah Kejuruan") {
                                                        echo "selected";
                                                    } ?> value="Sekolah Menengah Atas / Sekolah Menengah Kejuruan">Sekolah Menengah Atas / Sekolah Menengah Kejuruan</option>
                                            <option <?php if ($row->jenjang_pendidikan == "Diploma I") {
                                                        echo "selected";
                                                    } ?> value="Diploma I">Diploma I</option>
                                            <option <?php if ($row->jenjang_pendidikan == "Diploma II") {
                                                        echo "selected";
                                                    } ?> value="Diploma II">Diploma II</option>
                                            <option <?php if ($row->jenjang_pendidikan == "Diploma III") {
                                                        echo "selected";
                                                    } ?> value="Diploma III">Diploma III</option>
                                            <option <?php if ($row->jenjang_pendidikan == "Diploma IV") {
                                                        echo "selected";
                                                    } ?> value="Diploma IV">Diploma IV</option>
                                            <option <?php if ($row->jenjang_pendidikan == "Sarjana") {
                                                        echo "selected";
                                                    } ?> value="Sarjana">Sarjana</option>
                                            <option <?php if ($row->jenjang_pendidikan == "Magister") {
                                                        echo "selected";
                                                    } ?> value="Magister">Magister</option>
                                            <option <?php if ($row->jenjang_pendidikan == "Doktor") {
                                                        echo "selected";
                                                    } ?> value="Doktor">Doktor</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Institusi / Sekolah Pendidikan</label>
                                        <input class="form-control" name="tempat_pendidikan" value="<?php echo $row->tempat_pendidikan ?>" required="required" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label>Program Studi / Jurusan</label>
                                        <input class="form-control" name="jurusan" value="<?php echo $row->jurusan ?>" type="text">
                                        <small>*Kosongkan saja untuk sekolah dasar dan sekolah menengah pertama</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Tahun Lulus</label>
                                        <input class="form-control" name="tahun_lulus" value="<?php echo $row->tahun_lulus ?>" type="number" required="required">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary pull-right" value="Tambah" name="submit">Ok</button>
                                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <div id="tambahOrModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title"> Tambah Organisasi </h3>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo site_url('user/addOrganisasi/') ?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col col-lg-12">
                                <div class="form-group">
                                    <label>Nama Organisasi</label>
                                    <input class="form-control" name="nama_organisasi" required="required" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Jabatan</label>
                                    <input class="form-control" name="jabatan" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Tahun Aktif</label>
                                    <input class="form-control" name="tahun_aktif" type="number" required="required">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary pull-right" value="Tambah" name="submit">Ok</button>
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    foreach ($organisasi as $row) {
    ?>
        <div id="editOrModal<?php echo $row->id_organisasi ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title"> Edit Organisasi </h3>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?php echo site_url('user/updateOrganisasi/' . $row->id_organisasi) ?>" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col col-lg-12">
                                    <div class="form-group">
                                        <label>Nama Organisasi</label>
                                        <input class="form-control" name="nama_organisasi" value="<?php echo $row->nama_organisasi ?>" required="required" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <input class="form-control" name="jabatan" value="<?php echo $row->jabatan ?>" required="required" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label>Tahun Aktif</label>
                                        <input class="form-control" name="tahun_aktif" value="<?php echo $row->tahun_aktif ?>" type="number" required="required">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary pull-right" value="Tambah" name="submit">Ok</button>
                                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <div id="tambahPrModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title"> Tambah prestasi </h3>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo site_url('user/addPrestasi/') ?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col col-lg-12">
                                <div class="form-group">
                                    <label>Nama prestasi</label>
                                    <input class="form-control" name="nama_prestasi" required="required" type="text" placeholder="ex : Juara 1 Lomba Karya Ilmiah">
                                </div>
                                <div class=" form-group">
                                    <label>Upload Sertifikat / Piagam / Bukti Prestasi</label>
                                    <input type="file" class="dropify" height="50" name="file" data-max-file-size="2M" data-allowed-file-extensions="png jpg jpeg pdf">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary pull-right" value="Tambah" name="submit">Ok</button>
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="tambahSrModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title"> Tambah Sertifikat </h3>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo site_url('user/addSertifikat/') ?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col col-lg-12">
                                <div class="form-group">
                                    <label>Nama Sertifikat</label>
                                    <input class="form-control" name="nama_sertifikat" required="required" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Upload Sertifikat</label>
                                    <input type="file" class="dropify" height="50" name="file" required="required" data-max-file-size="2M" data-allowed-file-extensions="png jpg jpeg pdf">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary pull-right" value="Tambah" name="submit">Ok</button>
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="tambahBrModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title"> Upload Berkas </h3>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo site_url('user/addBerkas/') ?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col col-lg-12">
                                <div class="form-group">
                                    <label>Pilih Berkas</label>
                                    <select name="nama_berkas" class="form-control" required>
                                        <option value="" selected disabled hidden>Pilih..</option>
                                        <option value="Photocopy Ijazah Legalisir">Photocopy ijazah legalisir</option>
                                        <option value="Transkrip Nilai">Transkrip Nilai</option>
                                        <option value="Hasil Psikotest">Hasil Psikotest</option>
                                        <option value="Hasil TOEFL atau IELTS">Hasil TOEFL atau IELTS</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Upload Berkas</label>
                                    <input type="file" class="dropify" height="50" name="berkas" required="required" data-max-file-size="2M" data-allowed-file-extensions="pdf">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary pull-right" value="Tambah" name="submit">Ok</button>
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    foreach ($berkas as $row) {
    ?>
        <div id="editBrModal<?php echo $row->id_berkas ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title"> Edit Berkas </h3>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?php echo site_url('user/updateBerkas/' . $row->id_berkas) ?>" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control" name="nama_berkas" value="<?php echo $row->nama_berkas ?>" readonly type="text">
                                    </div>
                                    <div class="form-group">
                                        <label>Upload Berkas</label>
                                        <input type="file" class="dropify" height="50" name="berkas" required="required" data-max-file-size="2M" data-default-file="<?php echo base_url('assets/upload/berkas/' . $row->file) ?>" data-allowed-file-extensions="pdf">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary pull-right" value="Tambah" name="submit">Ok</button>
                                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>