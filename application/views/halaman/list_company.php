<div class="content-wrapper">
  <div class="container">
    <div class="row aos-init aos-animate" data-aos="fade-up">
      <div class="row" data-aos="fade-up">
        <div class="col-lg-3 stretch-card grid-margin">
          <div class="card">
            <div class="card-body">
              <h2>Category</h2>
              <ul class="vertical-menu">
                <li><a href="<?php echo site_url("halaman/list_iklan") ?>">Iklan Lowongan</a></li>
                <li><a href="<?php echo site_url("halaman/loker") ?>">Vacancy (Recruitment)</a></li>
                <li><a href="<?php echo site_url("halaman/jobfair") ?>">Job Fair</a></li>
                <li><a href="<?php echo site_url("halaman/info") ?>">Informasi Magang</a></li>
                <li><a href="<?php echo site_url("halaman/magang") ?>">Magang Bersertifikasi BUMN</a></li>
                <li><a href="<?php echo site_url("halaman/magang") ?>">Magang Mahasiswa</a></li>
                <li><a href="<?php echo site_url("halaman/beasiswa") ?>">Beasiswa</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-9 stretch-card grid-margin">
          <div class="card">
            <div class="card-body">
              <?php foreach ($company as $row) { ?>
                <div class="row">
                  <div class="col-sm-4 grid-margin">
                    <div class="position-relative">
                      <div class="rotate-img">
                        <?php if (empty($row->logo_perusahaan)) { ?>
                          <a href="<?php echo site_url("halaman/company/" . $row->id_perusahaan) ?>">
                            <img src="<?php echo site_url("assets/upload/logo/default.png") ?>" alt="thumb" class="img-fluid" style="width:150px;height:auto;" />
                          </a>
                        <?php } else { ?>
                          <a href="<?php echo site_url("halaman/company/" . $row->id_perusahaan) ?>">
                            <img src="<?php echo site_url("assets/upload/logo/") . $row->logo_perusahaan ?>" alt="thumb" class="img-fluid" style="width:150px;height:auto;" />
                          </a>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-8  grid-margin">
                    <a href="<?php echo site_url("halaman/company/" . $row->id_perusahaan) ?>">
                      <h2 class="mb-2 font-weight-600">
                        <?php echo $row->nama_perusahaan ?>
                      </h2>
                    </a>
                    <div class="fs-13 mb-2">
                      <span class="mr-2">Location : </span> <?php echo $row->alamat ?>
                    </div>
                  </div>
                </div>
              <?php } ?>
              <?php echo $pagination; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>