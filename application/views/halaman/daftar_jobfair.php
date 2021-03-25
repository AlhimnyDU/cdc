<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <div class="row aos-init aos-animate" data-aos="fade-up">
            <div class="col-md-8 grid-margin" style="margin-left: 200px;">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h4>Formulir Pendaftaran Itenas Virtual Job Fair 2021</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo site_url('halaman/daftarJobfair') ?>" method="post" enctype="multipart/form-data" class="form-floating" id="formulir">
                            <div class="form-group">
                                <label class="col-form-label label-align">Daftar Sebagai : </label>
                                <div class="mb-3">
                                    <select name="status" id="jenis" class="custom-select">
                                        <option value="" disabled hidden selected>Pilih...</option>
                                        <option value="peserta">Peserta</option>
                                        <option value="sponsorship">Sponsorship</option>
                                        <option value="scholarship">Scholarship</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label label-align">Nama Perusahaan</label>
                                <div class="mb-3">
                                    <input class="form-control" name="nama_perusahaan" required="required" type="text">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="col-form-label label-align">Bergerak di Bidang</label>
                                <div class="mb-3">
                                    <input class="form-control" name="bidang" required="required" type="text">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="col-form-label label-align">Email Perusahaan</label>
                                <div class="mb-3">
                                    <input class="form-control" name="email" required="required" type="email">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="col-form-label label-align">Telp/HP Perusahaan</label>
                                <div class="mb-3">
                                    <input class="form-control telp" name="telp_perusahaan" required="required" type="text">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="col-form-label label-align">Link Website</label>
                                <small style="color:red;">*Kosongkan, bila tidak ada</small>
                                <div class="mb-3">
                                    <input class="form-control" name="link_website" type="text">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="col-form-label label-align">Fax</label>
                                <small style="color:red;">*Kosongkan, bila tidak ada</small>
                                <div class="mb-3">
                                    <input class="form-control telp" name="fax" type="text">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="col-form-label label-align">Alamat Perusahaan</label>
                                <div class="mb-3">
                                    <textarea name="alamat" class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="col-form-label label-align">Nama Lengkap (PIC)</label>
                                <div class="mb-3">
                                    <input class="form-control" name="nama_pic" required="required" type="text">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="col-form-label label-align">Jabatan</label>
                                <div class="mb-3">
                                    <input class="form-control" name="jabatan" required="required" type="text">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="col-form-label label-align">Contact Person/HP (PIC)</label>
                                <div class="mb-3">
                                    <input class="form-control telp" name="cp" required="required" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label label-align">Logo Perusahaan</label>
                                <div class="mb-3">
                                    <input type="file" class="dropify" height="50" name="logo" data-max-file-size="2M" data-allowed-file-extensions="pdf" required>
                                </div>
                            </div>
                            <div class="form-group" id="paket">
                                <label class="col-form-label label-align">Menyatakan bahwa kami berminat ikut sebagai peserta dalam kegiatan "Itenas Virtual Job Fair 2021" dalam paket :</label>
                                <div class="mb-3">
                                    <div class="alert alert-warning" role="alert">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="paket" id="inlineRadio1" value="Platinum" disabled>
                                            <label class="form-check-label" for="inlineRadio1">Platinum</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="paket" id="inlineRadio2" value="Gold" disabled>
                                            <label class="form-check-label" for="inlineRadio2">Gold</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="paket" id="inlineRadio3" value="Bronze" disabled>
                                            <label class="form-check-label" for="inlineRadio3">Bronze</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="alert alert-info" role="alert">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Kami menyetujui bahwa data yang telah diisi adalah benar.
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <center>
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                    <!-- <button type="reset" class="btn btn-success">Reset</button> -->
                                </center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>