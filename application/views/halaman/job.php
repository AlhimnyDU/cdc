<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <div class="row aos-init aos-animate" data-aos="fade-up">
            <div class="col-sm-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <center>
                            <?php if (empty($job->logo_perusahaan)) { ?>
                                <img src="<?php echo site_url("assets/upload/logo/default.png") ?>" width="200px" />
                            <?php } else { ?>
                                <img width="200px" src="<?php echo site_url("assets/upload/logo/" . $job->logo_perusahaan) ?>" />
                            <?php } ?>
                            <br>
                            <small><?php echo $job->nama_perusahaan ?></small>
                            <h2 id=judul><?php echo $job->posisi ?></h2>
                        </center>
                        <h3>Description</h3>
                        <div>
                            <i><?php echo $job->deskripsi ?></i>
                        </div>
                        <hr>
                        <h3>Requirements</h3>
                        <div>
                            <?php echo $job->syarat ?>
                        </div>
                        <hr>
                        <h3>Other Information</h3>
                        <div>
                            <?php echo $job->informasi ?>
                        </div>
                        <hr>
                        <h3>Poster</h3>

                        <?php if ($job->poster) { ?>
                            <center><img width="500px" src="<?php echo site_url("assets/upload/poster/" . $job->poster) ?>" /></center>
                        <?php } else { ?>
                            <label>This job vacancy not have poster</label>
                        <?php } ?>
                        <hr>
                        <center>
                            <?php
                            $today = date("Y-m-d");
                            if (!$lamaran) {
                                if ($today <= $job->deadline) { ?>
                                    <?php if ((($this->session->userdata('user') == "mahasiswa") || ($this->session->userdata('user') == "alumni") || ($this->session->userdata('user') == "umum")) && ($job->jenis == 'Job Fair 2021') && ($this->session->userdata('mengikuti'))) { ?>
                                        <a class="btn btn-info buttonSubmit" href="<?php echo site_url("user/ajukan/" . $job->id_loker) ?>">Apply job here</a>
                                    <?php } else if ((($this->session->userdata('user') == "mahasiswa") || ($this->session->userdata('user') == "alumni") || ($this->session->userdata('user') == "umum")) && ($job->jenis == 'Job Fair 2021') && (empty($this->session->userdata('mengikuti')))) { ?>
                                        <a class="btn btn-info buttonSubmit" href="<?php echo site_url("user") ?>">Harus mendaftar mengikuti job fair terlebih dahulu</a>
                                    <?php } else if ((($this->session->userdata('user') == "mahasiswa") || ($this->session->userdata('user') == "alumni") || ($this->session->userdata('user') == "umum")) && ($job->jenis == 'vacancy')) { ?>
                                        <a class="btn btn-info buttonSubmit" href="<?php echo site_url("user/ajukan/" . $job->id_loker) ?>">Apply Now Here</a>
                                    <?php } else if (($this->session->userdata('user') == "mahasiswa") && ($job->jenis == 'magang')) { ?>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ajuModal">Apply Now Here</button>
                                    <?php } else { ?>
                                        <a class="btn btn-info disabled" href="#">Apply Now</a> | <a class="btn btn-info" href="<?php echo site_url("login") ?>">Buat akun terlebih dahulu</a> <br>
                                        <small style="color:red;">*Login required for user only</small>
                                    <?php } ?>
                                <?php } else { ?>
                                    <a class="btn btn-danger disabled" href="#">Telah Melewati Batas Waktu</a>
                                <?php }
                            } else { ?>
                                <a class="btn btn-danger disabled" href="#">Telah mengajukan tunggu informasi selanjutnya</a>
                            <?php } ?>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php if ($this->session->userdata('user')) { ?>
    <div class="modal fade" id="ajuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Daftar Magang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form" action="<?php echo site_url('user/daftarMagang/' . $job->id_loker) ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="alert alert-primary" role="alert">
                            <h4>1. Identitas Diri</h4>
                            <hr>
                            <div class="form-group">
                                <label class="">Nama Lengkap<span class="required">*</span></label>
                                <input class="form-control" name="nama" value="<?php echo $akun->nama ?>" required="required">
                            </div>
                            <div class="form-group">
                                <label class="">Agama<span class="required">*</span></label>
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
                            <div class="form-group">
                                <label class="">Jenis Kelamin<span class="required">*</span></label>
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
                            <div class="form-group">
                                <label class="">Tempat Lahir<span class="required">*</span></label>
                                <input class="form-control" value="<?php echo $akun->tempat_lahir ?>" name="tempat_lahir" type="text" required>
                            </div>
                            <div class="form-group">
                                <label class="">Tanggal Lahir<span class="required">*</span></label>
                                <input class="form-control" name="tanggal_lahir" type="date" value="<?php echo $akun->tanggal_lahir ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="">Email<span class="required">*</span></label>
                                <input class="form-control " name="email" required="required" value="<?php echo $akun->email ?>" type="text">
                            </div>
                            <div class="form-group">
                                <label class="">Nomor Handphone<span class="required">*</span></label>
                                <input class="form-control telp" id="telp" name="telp" required="required" value="<?php echo $akun->telp ?>" type="text">
                            </div>
                            <div class="form-group">
                                <label class="">Alamat Tinggal<span class="required">*</span></label>
                                <textarea class="form-control" rows="3" required="required" name="alamat"><?php echo $akun->alamat ?></textarea>
                            </div>
                            <div class="form-group">
                                <label class="">Desa / Kelurahan<span class="required">*</span></label>
                                <input class="form-control" name="desa_kelurahan" value="<?php echo $akun->desa_kelurahan ?>" required="required" type="text">
                            </div>
                            <div class="form-group">
                                <label class="">Kecamatan<span class="required">*</span></label>
                                <input class="form-control" name="kecamatan" value="<?php echo $akun->kecamatan ?>" required="required" type="text">
                            </div>
                            <div class="form-group">
                                <label class="">Kota / Kabupaten<span class="required">*</span></label>
                                <input class="form-control" name="kota_kabupaten" value="<?php echo $akun->kota_kabupaten ?>" required="required" type="text">
                            </div>
                            <div class="form-group">
                                <label class="">Provinsi<span class="required">*</span></label>

                                <input class="form-control" name="provinsi" value="<?php echo $akun->provinsi ?>" required="required" type="text">
                            </div>
                            <div class="form-group">
                                <label class="">Kode Pos<span class="required">*</span></label>

                                <input class="form-control" name="kode_pos" value="<?php echo $akun->kode_pos ?>" required="required" type="text">
                            </div>
                        </div>
                        <div class="alert alert-info" role="alert">
                            <h4>2. Data Akademik</h4>
                            <hr>
                            <div class="form-group">
                                <label>NIM / NRP<span class="required">*</span></label>
                                <div>
                                    <input class="form-control" name="nomor_induk" value="<?php echo $akun->nomor_induk ?>" required="required" type="number">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Semester<span class="required">*</span></label>
                                <div>
                                    <input class="form-control" name="semester" value="<?php echo $akun->semester ?>" required="required" type="number">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Perguruan Tinggi<span class="required">*</span></label>
                                <div>
                                    <input class="form-control" name="universitas" value="Institut Teknologi Nasional Bandung" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Fakultas<span class="required">*</span></label>
                                <div>
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
                            <div class="form-group">
                                <label>Program Studi<span class="required">*</span></label>
                                <div>
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
                            <div class="form-group">
                                <label>Nilai IPK Terakhir<span class="required">*</span></label>
                                <div>
                                    <input type="text" class="form-control ipk" name="ipk" value="<?php echo $akun->ipk ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-warning" role="alert">
                            <div class="form-group">
                                <label>Sebutkan skill / keahlian anda<span class="required">*</span></label>
                                <div>
                                    <textarea class="form-control" name="keahlian" rows="5" required><?php echo $akun->keahlian ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-secondary" role="alert">
                            <h4>3. Berkas</h4>
                            <hr>
                            <?php foreach ($persyaratan as $row) { ?>
                                <div class="form-group">
                                    <label><?php echo $row->nama_syarat ?></label>
                                    <div>
                                        <input type="text" name="nama_berkas[]" value="<?php echo $row->nama_syarat ?>" hidden>
                                        <input type="file" class="dropify" height="50" name="berkas[]" data-max-file-size="2M" data-allowed-file-extensions="pdf" required>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="alert alert-danger" role="alert">
                            <input type="checkbox" class="custom-checkbox" name="nama_syarat" required> Saya setuju dengan syarat & ketentuan juga telah melengkapi data dengan benar</input>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>