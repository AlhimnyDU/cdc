<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <div class="row aos-init aos-animate" data-aos="fade-up">
            <div class="col-md-8 grid-margin" style="margin-left: 200px;">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h4>Lupa Password Akun CDC Itenas</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="formulir" action="<?php echo site_url('login/gantiPass/' . $verifikasi) ?>" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control has-feedback-left" id="password" name="password" placeholder="Password" required="" />
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control has-feedback-left" id="conf_password" name="conf_password" placeholder="Re-Password" required="" />
                                </div>
                            </div>
                            <center>
                                <button class="btn btn-primary btn-sm buttonSubmit">Submit</button>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>