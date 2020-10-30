<div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form class="form-label-left input_mask" method="POST" action="<?php echo site_url("login/addPerusahaan"); ?>">
              <h1>Registrasi Perusahaan</h1>
              <div class="col-md-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left"  name="nama_perusahaan" placeholder="Nama Perusahaan" required="" />
                <span class="fa fa-institution form-control-feedback left" aria-hidden="true"></span>
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
                <textarea type="text" class="form-control has-feedback-left" placeholder="Alamat" name="alamat" required=""></textarea>
                <span class="fa fa-building-o form-control-feedback left" aria-hidden="true"></span>
              </div>
              <div class="col-md-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left" name="nama_pj" placeholder="Nama Penanggung Jawab" required=""/>
                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
              </div>
              <div class="col-md-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left" name="telp_pj" placeholder="Telepon Penanggung Jawab" required=""/>
                <span class="fa fa-mobile form-control-feedback left" aria-hidden="true"></span>
              </div>
              <hr>
              <div>
                <button id="btnSubmit" class="btn btn-primary btn-sm submit">Submit</button>
              </div>
              <div class="clearfix"></div>
            </form>
          </section>
        </div>
      </div>
    </div>