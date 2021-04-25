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
                        <form id="formulir" action="<?php echo site_url('login/searchEmail') ?>" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Masukkan Email</label>
                                    <input type="email" class="form-control has-feedback-left" name="email" placeholder="Email" required="" />
                                </div>
                            </div>
                            <center>
                                <button class="btn btn-primary btn-sm submit">Submit</button>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>