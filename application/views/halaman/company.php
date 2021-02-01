<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">
    <div class="row aos-init aos-animate" data-aos="fade-up">
      <div class="col-sm-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <center>
              <?php if (empty($company->logo_perusahaan)) { ?>
                <img src="<?php echo site_url("assets/upload/logo/default.png") ?>" width="200px" />
              <?php } else { ?>
                <img width="200px" src="<?php echo site_url("assets/upload/logo/" . $company->logo_perusahaan) ?>" />
              <?php } ?>
              <br>
              <h3><?php echo $company->nama_perusahaan ?></h3>
              <br>
              <h3>Email</h3>
              <i><?php echo $company->email ?></i>
              <hr>
              <h3>Telepon</h3>
              <i><?php echo $company->telp_perusahaan ?></i>
              <hr>
              <h3>Address</h3>
              <i><?php echo $company->alamat ?></i>
              <hr>
              <h3>Description</h3>
              <?php if ($company->deskripsi) { ?>
                <i><?php echo $company->deskripsi ?></i>
              <?php } else { ?>
                <i>No Description</i>
              <?php } ?>
            </center>
            <div>

            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <?php if ($vacancy) { ?>
      <div class="row aos-init aos-animate" data-aos="fade-up">
        <div class="col-lg-3 stretch-card grid-margin">
          <div class="card">
            <div class="card-body">
              <h2>Category</h2>
              <ul class="vertical-menu">
                <li><a href="<?php echo site_url("halaman/loker") ?>">Vacancy</a></li>
                <li><a href="<?php echo site_url("halaman/jobfair") ?>">Job Fair</a></li>
                <li><a href="<?php echo site_url("halaman/magang") ?>">Magang</a></li>
                <li><a href="<?php echo site_url("halaman/beasiswa") ?>">Beasiswa</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-9 stretch-card grid-margin">
          <div class="card">
            <div class="card-body">
              <?php foreach ($vacancy as $row) { ?>
                <div class="row">
                  <div class="col-sm-3 grid-margin">
                    <div class="position-relative">
                      <div class="rotate-img">
                        <center>
                          <?php if (empty($row->logo_perusahaan)) { ?>
                            <a href="<?php echo site_url("halaman/company/" . $row->id_perusahaan) ?>">
                              <img src="<?php echo site_url("assets/upload/logo/default.png") ?>" alt="thumb" class="img-fluid" />
                            </a>
                          <?php } else { ?>
                            <a href="<?php echo site_url("halaman/company/" . $row->id_perusahaan) ?>">
                              <img src="<?php echo site_url("assets/upload/logo/") . $row->logo_perusahaan ?>" alt="thumb" class="img-fluid" style="width:150px;height:auto;" />
                            </a>
                          <?php } ?>
                        </center>
                      </div>
                      <div class="badge-positioned">
                        <span class="badge badge-danger font-weight-bold"><?php echo $row->jenis ?></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-9  grid-margin">
                    <a href="<?php echo site_url("halaman/job/" . $row->id_loker) ?>">
                      <h4>
                        <?php echo $row->posisi ?>
                      </h4>
                    </a>
                    <div class="fs-13 mb-2">
                      <span class="badge badge-danger">Deadline : <?php echo date("d M Y", strtotime($row->deadline)) ?></span>
                    </div>
                    <div class="fs-13 mb-2">
                      <span class="badge badge-light">Location : </span>
                      <p style="text-align: justify;font-size: 14px;"><?php echo $row->lokasi ?></p>
                    </div>
                    <p style="text-align: justify;font-size: 14px;">
                      <?php echo substr($row->deskripsi, 0, 150) ?>..<a href="<?php echo site_url("halaman/job/" . $row->id_loker) ?>">Read More</a>
                    </p>
                  </div>
                </div>
                <hr>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    <?php } else { ?>
      <center>
        <h1>Not post job vacancy</h1>
      </center>
    <?php } ?>
  </div>
</section>