<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <div class="row aos-init aos-animate" data-aos="fade-up">
            <div class="col-sm-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo site_url('halaman/daftarAcara/' . $acara->id_acara) ?>" method="post" enctype="multipart/form-data">
                            <span class="section">Pendaftaran Peserta Acara <?php echo $acara->nama_acara ?></span>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">NIM / NRP<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="nomor_induk" value="<?php echo $akun->nomor_induk ?>" required="required" type="number">
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Lengkap<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="nama" value="<?php echo $akun->nama ?>" required="required" disabled>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Email<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control " name="email" required="required" value="<?php echo $akun->email ?>" type="text" disabled>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Nomor Handphone<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control telp" id="telp" name="telp" required="required" value="<?php echo $akun->telp ?>" type="text" disabled>
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>