<div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST" action="<?php echo site_url("login/auth"); ?>">
              <h1>Login Akun</h1>
              <div>
                <input type="email" class="form-control" name="email" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="password" placeholder="Password" required="" />
              </div>
              <div>
                <button class="btn btn-primary btn-sm submit">Log in</button>
              </div>
              <div class="clearfix"></div>
              <div class="separator">
                <p class="change_link">Belum punya akun?
                  <a href="#signup" class="btn btn-info btn-sm to_register"> Daftar akun disini </a>
                </p>
                <p class="change_link">Daftar sebagai perusahaan ?
                  <a href="<?php echo site_url("login/perusahaan"); ?>" class="btn btn-danger btn-sm">Daftar disini</a>
                </p>
                <div class="clearfix"></div>
              </div>
            </form>
          </section>
        </div>
        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form class="form-label-left input_mask" method="POST" action="<?php echo site_url("login/addMahasiswa"); ?>">
              <h1>Registrasi Akun</h1>
              <div class="col-md-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left" name="nrp" placeholder="NIM/NRP" required="" />
                <span class="glyphicon glyphicon-credit-card form-control-feedback left" aria-hidden="true"></span>
              </div>
              <div class="col-md-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left"  name="nama" placeholder="Nama Lengkap" required="" />
                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
              </div>
              <div class="col-md-12 form-group has-feedback">
                <input type="email" class="form-control has-feedback-left" name="email" placeholder="Email" required="" />
                <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
              </div>
              <div class="col-md-12 form-group has-feedback">
                <input type="password" class="form-control has-feedback-left" id="password" name="password" placeholder="Password" required="" />
                <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
              </div>
              <div class="col-md-12 form-group has-feedback">
                <input type="password" class="form-control has-feedback-left" id="conf_password" name="conf_password" placeholder="Re-Password" required="" />
                <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
              </div>
              <div class="col-md-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left" name="telp" placeholder="Telepon" required="" />
                <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
              </div>
              <div class="col-md-12 form-group has-feedback">
                <select class="form-control has-feedback-left" name="role">		
									<option value="" selected disabled hidden>Pilih Role</option>
									<option value="mahasiswa">Mahasiswa</option>
									<option value="alumni">Alumni</option>
								</select>
                <span class="fa fa-users form-control-feedback left" aria-hidden="true"></span>
              </div>
              <div class="col-md-12 form-group has-feedback">
                <br>
                <textarea type="text" class="form-control" placeholder="Alamat" name="alamat" required=""></textarea>
              </div>
              <hr>
              <div>
                <button id="btnSubmit" class="btn btn-primary btn-sm submit">Submit</button>
              </div>
              <div class="clearfix"></div>
              <div class="separator">
                <p class="change_link">Sudah mempunyai akun ?
                  <a href="#signin" class="to_register"> Klik login disini </a>
                </p>
                <p class="change_link">Daftar sebagai perusahaan ?
                  <a href="<?php echo site_url("login/perusahaan"); ?>" class="btn btn-danger btn-sm">Daftar disini</a>
                </p>
                <div class="clearfix"></div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>