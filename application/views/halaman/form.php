<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <div class="row aos-init aos-animate" data-aos="fade-up">
            <div class="col-md-8 grid-margin" style="margin-left: 200px;">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h4>Formulir <?php echo $acara->nama_acara ?></h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if ($acara->status == "Aktif") { ?>
                            <form action="<?php echo site_url('halaman/daftarAcara/' . $acara->id_acara) ?>" method="post" enctype="multipart/form-data" class="form-floating" id="formulir">
                                <?php foreach ($form as $row) { ?>
                                    <div class="form-group">
                                        <label class="col-form-label label-align"><?php echo $row->soal  ?></label>
                                        <div class="mb-3">
                                            <?php if ($row->jenis_jawaban == "email") { ?>
                                                <input class="form-control" name="<?php echo $row->id_soal ?>" required="required" type="email">
                                            <?php } else if ($row->jenis_jawaban == "textfield") { ?>
                                                <input class="form-control" name="<?php echo $row->id_soal ?>" required="required" type="text">
                                            <?php } else if ($row->jenis_jawaban == "textfield_number") { ?>
                                                <input class="form-control" name="<?php echo $row->id_soal ?>" required="required" type="number">
                                            <?php } else if ($row->jenis_jawaban == "textarea") { ?>
                                                <textarea class="form-control" name="<?php echo $row->id_soal ?>" required="required" rows="5"></textarea>
                                            <?php } else if ($row->jenis_jawaban == "pilihanganda") { ?>
                                                <div class="alert alert-light" role="alert">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="<?php echo $row->id_soal ?>" id="inlineRadio1" value="Ya" required="required">
                                                        <label class="form-check-label" for="inlineRadio1">Ya</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="<?php echo $row->id_soal ?>" id="inlineRadio2" value="Tidak" required="required">
                                                        <label class="form-check-label" for="inlineRadio2">Tidak</label>
                                                    </div>
                                                </div>

                                            <?php } else if ($row->jenis_jawaban == "penilaian") { ?>
                                                <div class="alert alert-light" role="alert">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="<?php echo $row->id_soal ?>" id="inlineRadio1" value="Sangat Kurang" required="required">
                                                        <label class="form-check-label" for="inlineRadio1">Sangat Kurang</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="<?php echo $row->id_soal ?>" id="inlineRadio2" value="Kurang">
                                                        <label class="form-check-label" for="inlineRadio2">Kurang</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="<?php echo $row->id_soal ?>" id="inlineRadio3" value="Cukup">
                                                        <label class="form-check-label" for="inlineRadio3">Cukup</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="<?php echo $row->id_soal ?>" id="inlineRadio4" value="Baik">
                                                        <label class="form-check-label" for="inlineRadio4">Baik</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="<?php echo $row->id_soal ?>" id="inlineRadio5" value="Sangat Baik">
                                                        <label class="form-check-label" for="inlineRadio5">Sangat Baik</label>
                                                    </div>
                                                </div>
                                            <?php } else if ($row->jenis_jawaban == "prodi") { ?>
                                                <select class="custom-select" name="<?php echo $row->id_soal ?>" required>
                                                    <option value="" disabled hidden selected>Pilih</option>
                                                    <option value="Teknik Elektro">
                                                        Teknik Elektro
                                                    </option>
                                                    <option value="Teknik Mesin" >
                                                        Teknik Mesin
                                                    </option>
                                                    <option value="Teknik Industri">
                                                        Teknik Industri
                                                    </option>
                                                    <option value="Teknik Kimia">
                                                        Teknik Kimia
                                                    </option>
                                                    <option value="Informatika">
                                                        Informatika
                                                    </option>
                                                    <option value="Sistem Informasi">
                                                        Sistem Informasi
                                                    </option>
                                                    <option value="Teknik Sipil">
                                                        Teknik Sipil
                                                    </option>
                                                    <option value="Teknik Geodesi">
                                                        Teknik Geodesi
                                                    </option>
                                                    <option value="Perencanaan Wilayah dan Kota">
                                                        Perencanaan Wilayah dan Kota
                                                    </option>
                                                    <option value="Teknik Lingkungan">
                                                        Teknik Lingkungan
                                                    </option>
                                                    <option value="Arsitektur">
                                                        Arsitektur
                                                    </option>
                                                    <option value="Desain Interior">
                                                        Desain Interior
                                                    </option>
                                                    <option value="Desain Produk">
                                                        Desain Produk
                                                    </option>
                                                    <option value="Desain Komunikasi Visual">
                                                        Desain Komunikasi Visual
                                                    </option>
                                                </select>
                                            <?php } else if ($row->jenis_jawaban == "fakultas") { ?>
                                                <select class="custom-select" name="<?php echo $row->id_soal ?>" required>
                                                    <option value="" disabled hidden selected>Pilih</option>
                                                    <option value="Fakultas Teknologi Industri">
                                                        Fakultas Teknologi Industri
                                                    </option>
                                                    <option value="Fakultas Teknik Sipil dan Perencanaan">
                                                        Fakultas Teknik Sipil dan Perencanaan
                                                    </option>
                                                    <option value="Fakultas Arsitektur dan Desain">
                                                        Fakultas Arsitektur dan Desain
                                                    </option>
                                                </select>
                                            <?php } else if ($row->jenis_jawaban == "info") { ?>
                                                <select class="custom-select" name="<?php echo $row->id_soal ?>" required>
                                                    <option value="" disabled hidden selected>Pilih</option>
                                                    <option value="Whatsapp">
                                                        Whatsapp
                                                    </option>
                                                    <option value="Instagram">
                                                        Instagram
                                                    </option>
                                                    <option value="Website">
                                                        Website Itenas
                                                    </option>
                                                    <option value="Sosmed Lainnya">
                                                        Social Media Lainnya
                                                    </option>
                                                    <option value="Lainnya">
                                                        Lainnya
                                                    </option>
                                                </select>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <hr>
                                <?php } ?>
                                <div class="form-group">
                                    <center>
                                        <input type="submit" class="btn btn-primary" value="Submit">
                                        <!-- <button type="reset" class="btn btn-success">Reset</button> -->
                                    </center>
                                </div>
                            </form>
                        <?php } else { ?>
                            <div class="alert alert-danger" role="alert">
                                Formulir sudah tidak menerima responden lagi karena sesi sudah berakhir atau sesi formulir belum dimulai
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>