<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <div class="row aos-init aos-animate" data-aos="fade-up">
            <div class="col-md-8 grid-margin" style="margin-left: 200px;">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h4>Pendaftaran Akun CDC Virtual Job Fair Itenas 2021</h4>
                            <small>*jika sudah memiliki akun cdc tidak perlu daftar</small>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="formulir" action="<?php echo site_url('login/addMahasiswa/') ?>" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="alert alert-light" role="alert">
                                    <h4>1. Data Akun</h4>
                                    <hr>
                                    <div class="form-group">
                                        <label>Pilih jenis akun</label>
                                        <select class="form-control has-feedback-left" id="role" name="role">
                                            <option value="" selected disabled hidden>Pilih Role</option>
                                            <option value="mahasiswa">Mahasiswa Itenas</option>
                                            <option value="alumni">Alumni Itenas</option>
                                            <option value="umum">Umum</option>
                                        </select>
                                    </div>
                                    <div id="umum">
                                        <div class="form-group">
                                            <label>Asal Institusi</label>
                                            <input type="text" class="form-control has-feedback-left" id="asal" name="asal_institusi" placeholder="Asal Institusi" required />
                                        </div>
                                        <div class="form-group">
                                            <label>NIK e-KTP</label>
                                            <input type="number" class="form-control has-feedback-left" id="nik" name="nrp" placeholder="NIK" required />
                                        </div>
                                    </div>
                                    <div id="internal">
                                        <div class="form-group">
                                            <label>NIM / NRP</label>
                                            <input type="number" class="form-control has-feedback-left" id="nrp" name="nrp" placeholder="ex: 152017130" required />
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control has-feedback-left" name="email" placeholder="" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control has-feedback-left" id="password" name="password" placeholder="" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Re-Password</label>
                                            <input type="password" class="form-control has-feedback-left" id="conf_password" name="conf_password" placeholder="" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="alert alert-light" role="alert">
                                    <h4>2. Identitas Diri</h4>
                                    <hr>
                                    <div class="form-group">
                                        <label class="">Nama Lengkap<span class="required">*</span></label>
                                        <input class="form-control" name="nama" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label class="">Agama<span class="required">*</span></label>
                                        <select name="agama" class="form-control" required>
                                            <option value="" selected disabled hidden>Pilih..</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Protestan">Protestan</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Buddha">Buddha</option>
                                            <option value="Khonghucu">Khonghucu</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="">Jenis Kelamin<span class="required">*</span></label>
                                        <select name="jenis_kelamin" class="form-control" required>
                                            <option value="" selected disabled hidden>Pilih..</option>
                                            <option value="Pria">Pria</option>
                                            <option value="Wanita">Wanita</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="">Tempat Lahir<span class="required">*</span></label>
                                        <input class="form-control" name="tempat_lahir" type="text" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="">Tanggal Lahir<span class="required">*</span></label>
                                        <input class="form-control" name="tanggal_lahir" type="date" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="">Nomor Handphone<span class="required">*</span></label>
                                        <input class="form-control telp" id="telp" name="telp" required="required" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label class="">Alamat Tinggal<span class="required">*</span></label>
                                        <textarea class="form-control" rows="3" required="required" name="alamat"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="">Desa / Kelurahan<span class="required">*</span></label>
                                        <input class="form-control" name="desa_kelurahan" required="required" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label class="">Kecamatan<span class="required">*</span></label>
                                        <input class="form-control" name="kecamatan" required="required" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label class="">Kota / Kabupaten<span class="required">*</span></label>
                                        <input class="form-control" name="kota_kabupaten" required="required" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label class="">Provinsi<span class="required">*</span></label>

                                        <input class="form-control" name="provinsi" required="required" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label class="">Kode Pos<span class="required">*</span></label>

                                        <input class="form-control" name="kode_pos" required="required" type="text">
                                    </div>
                                </div>
                                <div class="alert alert-warning" role="alert">
                                    <input type="checkbox" class="custom-checkbox" name="nama_syarat" required> Saya setuju dengan syarat & ketentuan juga telah melengkapi data dengan benar</input>
                                </div>
                            </div>
                            <center>
                                <button id="btnSubmit" class="btn btn-primary btn-sm submit buttonSubmit">Daftar</button>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>