        <!-- partial -->
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
          <div id="carouselExampleSlidesOnly" class="carousel slide">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="<?php echo base_url() ?>assets/home/jobfair/JobFair_slides-21-10.jpg" alt="First slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </section><!-- End Breadcrumbs -->
        <!-- <section id="blog" class="blog" style="background-color: #ff5821;">
          <div class="col-sm-12 grid-margin" style="margin-top:10px">
            <center>
              <h2 style="color:#ffffff">JOB FAIR</h2>
            </center>
            <center>
              <div id="pendaftaran" class="flipdown"></div>
            </center>
          </div>
        </section> -->
        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog section-bg">
          <div class="container">
            <div class="section-title" data-aos="fade-up">
              <h2>Advertisement</h2>
              <p data-aos="fade-up" class="aos-init aos-animate">See all advertise at<a href="<?php echo site_url("halaman/loker") ?>" class="mb-3"> Advertisement and Job</a></p>
            </div>
            <div class="row">
              <?php foreach ($iklan as $row) { ?>
                <div class="col-lg-4  col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                  <article class="entry">
                    <div class="entry-img">
                      <img src="<?php echo base_url('assets/upload/iklan/' . $row->file) ?>" alt="" class="img-fluid" style="width:350px ;height:250px;">
                    </div>
                    <h2 class="entry-title">
                      <a href="<?php echo site_url('halaman/iklan/' . $row->id_iklan) ?>"><?php echo $row->judul ?></a>
                    </h2>
                    <div class="entry-content">
                      <span class="badge badge-danger"><?php echo $row->status ?></span>
                      <div class="read-more">
                        <a href="<?php echo site_url('halaman/iklan/' . $row->id_iklan) ?>">Read More</a>
                      </div>
                    </div>
                  </article><!-- End blog entry -->
                </div>
              <?php } ?>
            </div>
          </div>
        </section><!-- End Blog Section -->
        <section id="blog" class="blog">
          <div class="container">
            <div class="section-title" data-aos="fade-up">
              <h2>Requirement Vacancy At this site</h2>
            </div>
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
                    <div style="margin-left:500px;"><a href="<?php echo site_url("halaman/loker") ?>" class="mb-3">Click here to see all job vacancy list</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
        </section>
        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog section-bg">
          <div class="container">
            <div class="section-title" data-aos="fade-up">
              <h2>Recent News</h2>
              <p data-aos="fade-up" class="aos-init aos-animate">See all info & news at <a href="<?php echo site_url("halaman/loker") ?>" class="mb-3">Information & News</a></p>
            </div>
            <div class="row">
              <?php foreach ($artikel as $row) { ?>
                <div class="col-lg-4  col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                  <article class="entry">
                    <div class="entry-img">
                      <img src="<?php echo base_url('assets/upload/post/' . $row->gambar) ?>" alt="" class="img-fluid">
                    </div>
                    <h2 class="entry-title">
                      <a href="<?php echo site_url('halaman/artikel/' . $row->id_artikel) ?>"><?php echo $row->judul ?></a>
                    </h2>
                    <div class="entry-content">
                      <?php echo substr($row->headline, 0, 160) ?>
                      <div class="read-more">
                        <a href="<?php echo site_url('halaman/artikel/' . $row->id_artikel) ?>">Read More</a>
                      </div>
                    </div>

                  </article><!-- End blog entry -->
                </div>
              <?php } ?>
            </div>
          </div>
        </section><!-- End Blog Section -->
        <section id="clients" class="clients">
          <div class="container" data-aos="fade-up">
            <div class="section-title" data-aos="fade-up">
              <h2>Company</h2>
            </div>
            <div class="owl-carousel clients-carousel">
              <?php foreach ($client as $row) { ?>
                <img src="<?php echo site_url("assets/upload/logo/") . $row->logo_perusahaan ?>" alt="thumb" class="img-fluid" style="width:150px;height:auto;">
              <?php } ?>
            </div>

          </div>
        </section>