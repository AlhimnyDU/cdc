<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <div class="row aos-init aos-animate" data-aos="fade-up">
            <div class="col-sm-12 grid-margin">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h4>Peserta Acara <?php echo $acara->nama_acara ?></h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo site_url('halaman/daftarAcara/' . $acara->id_acara) ?>" method="post" enctype="multipart/form-data">
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">NIM / NRP<span class="required">*</span></label>
                                <div>
                                    <input class="form-control" name="nim" required="required" type="number">
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Lengkap<span class="required">*</span></label>
                                <div>
                                    <input class="form-control" name="nama_peserta" required="required" type="text">
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Email<span class="required">*</span></label>
                                <div>
                                    <input class="form-control " name="email" required="required" type="email">
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Nomor Handphone<span class="required">*</span></label>
                                <div>
                                    <input class="form-control telp" name="no_hp" required="required" type="text">
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Perguruan Tinggi<span class="required">*</span></label>
                                <div>
                                    <input class="form-control" name="perguruan_tinggi" type="text" required="required">
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Fakultas<span class="required">*</span></label>
                                <div>
                                    <input class="form-control" name="fakultas" type="text" required="required">
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Program Studi<span class="required">*</span></label>
                                <div>
                                    <input class="form-control" name="prodi" type="text" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <center>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-success">Reset</button>
                                </center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>