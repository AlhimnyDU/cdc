<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <div class="row aos-init aos-animate" data-aos="fade-up">
            <div class="col-md-8 grid-margin" style="margin-left: 200px;">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h4>Pendaftaran Perusahaan CDC ITENAS</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="formulir" action="<?php echo site_url('login/addPerusahaan/') ?>" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <h4>Isikan Data Perusahaan</h4>
                                <hr>
                                <div class="form-group">
                                    <label>Nama Perusahaan / Instansi</label>
                                    <input type="text" class="form-control has-feedback-left" name="nama_perusahaan" placeholder="Nama Perusahaan" required="" />
                                </div>
                                <div class="form-group">
                                    <label>Email Perusahaan</label>
                                    <input type="email" class="form-control has-feedback-left" name="email" placeholder="Email" required="" />
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control has-feedback-left" id="password" name="password" placeholder="Password" required="" />
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control has-feedback-left" id="conf_password" name="conf_password" placeholder="Re-Password" required="" />
                                </div>
                                <div class="form-group">
                                    <label>Telepon Perusahaan</label>
                                    <input type="text" class="form-control has-feedback-left" name="telp" placeholder="Telepon Perusahaan" required="" />
                                </div>
                                <div class="form-group">
                                    <label>Alamat Perusahaan</label>
                                    <textarea type="text" class="form-control has-feedback-left" placeholder="Alamat Perusahaan" name="alamat" required=""></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Nama PIC / CP / Penanggung Jawab Akun</label>
                                    <input type="text" class="form-control has-feedback-left" name="nama_pj" placeholder="Nama Penanggung Jawab" required="" />
                                </div>
                                <div class="form-group">
                                    <label>Telepon PIC / CP / Penanggung Jawab Akun</label>
                                    <input type="text" class="form-control has-feedback-left" name="telp_pj" placeholder="Telepon Penanggung Jawab" required="" />
                                </div>
                                <div class="form-group">
                                    <label>Upload Logo Perusahaan</label>
                                    <input type="file" class="dropify" height="100" name="logo" data-max-file-size="1M" data-allowed-file-extensions="jpg jpeg png" required="">
                                </div>
                                <div class="alert alert-warning" role="alert">
                                    <input type="checkbox" class="custom-checkbox" name="nama_syarat" required> Saya menyetujui bahwa telah melengkapi isian data pendaftaran ini dengan benar</input>
                                </div>
                            </div>
                            <center>
                                <button class="btn btn-primary btn-sm buttonSubmit">Daftar</button>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>