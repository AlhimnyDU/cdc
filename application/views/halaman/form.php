<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <div class="row aos-init aos-animate" data-aos="fade-up">
            <div class="col-sm-12 grid-margin">
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