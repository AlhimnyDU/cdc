<div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form>
              <h1>Login Form</h1>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-primary submit" href="">Log in</a>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>
              <div class="clearfix"></div>
              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>
                <div class="clearfix"></div>
              </div>
            </form>
          </section>
        </div>
        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form method="POST" action="">
              <h1>Buat Akun Mahasiswa</h1>
              <div>
                <input type="text" class="form-control" name="nomor_induk" placeholder="NIM/NRP" required="" />
              </div>
              <div>
                <input type="text" class="form-control"  name="nama" placeholder="Nama Lengkap" required="" />
              </div>
              <div>
                <input type="email" class="form-control" name="email" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="password" placeholder="Password" required="" />
              </div>
              <div>
                <input type="text" class="form-control" name="telp" placeholder="Nomor Telepon" required="" />
              </div>
              <div>
                <select class="form-control" name="role">		
									<option value="" selected disabled hidden>Pilih Role</option>
									<option value="mahasiswa">Mahasiswa</option>
									<option value="alumni">Alumni</option>
								</select>
              </div>
              <div>
                <br>
                <textarea type="text" class="form-control" placeholder="Alamat" required=""></textarea>
              </div>
              <div>
                <a class="btn btn-primary submit">Submit</a>
              </div>
              <div class="clearfix"></div>
              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>
                <div class="clearfix"></div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>