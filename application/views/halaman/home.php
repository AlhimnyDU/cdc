        <!-- partial -->
        <section id="blog" class="blog" style="background-color: #fc766aff;">
          <div class="col-sm-12 grid-margin" style="margin-top:10px">
            <center>
              <h2 style="color:#ff5821">JOB FAIR</h2>
            </center>
            <center>
              <div id="pendaftaran" class="flipdown"></div>
            </center>
          </div>
        </section>
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
          <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="<?php echo base_url() ?>assets/home/jobfair/bg_jobfair.jpeg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo base_url() ?>assets/home/jobfair/bg_jobfair.jpeg" alt="Second slide">
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
        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
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
                      <a href="<?php echo site_url('halaman/artikel/' . $row->id_iklan) ?>"><?php echo $row->judul ?></a>
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
        <section id="blog" class="blog section-bg">
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
        </section><!-- End Clients Section -->
        <!-- <div class="row" data-aos="fade-up">
          <div class="col-sm-12 grid-margin">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-4">
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="card-title">
                        List Company
                      </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
                      <div class="div-w-80 mr-3">
                        <div class="rotate-img">
                          <a href="#">
                            <img src="<?php echo site_url("assets/upload/logo/fix/CV_Pudak.png") ?>" alt="thumb" class="img-fluid" />
                          </a>
                        </div>
                      </div>
                      <a href="#" style="color:#000000;">
                        <h5 class="font-weight-600 mb-0">
                          <?php echo "CV. Pudak Scientific"; ?>
                        </h5>
                      </a>
                    </div>
                    <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
                      <div class="div-w-80 mr-3">
                        <div class="rotate-img">
                          <a href="#">
                            <img src="<?php echo site_url("assets/upload/logo/fix/Roman_Keramik.jpg") ?>" alt="thumb" class="img-fluid" />
                          </a>
                        </div>
                      </div>
                      <a href="#" style="color:#000000;">
                        <h5 class="font-weight-600 mb-0">
                          <?php echo "Roman Keramik"; ?>
                        </h5>
                      </a>
                    </div>
                    <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
                      <div class="div-w-80 mr-3">
                        <div class="rotate-img">
                          <a href="#">
                            <img src="<?php echo site_url("assets/upload/logo/fix/ERMA.png") ?>" alt="thumb" class="img-fluid" />
                          </a>
                        </div>
                      </div>
                      <a href="#" style="color:#000000;">
                        <h5 class="font-weight-600 mb-0">
                          <?php echo "ERMA"; ?>
                        </h5>
                      </a>
                    </div>
                    <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
                      <div class="div-w-80 mr-3">
                        <div class="rotate-img">
                          <a href="#">
                            <img src="<?php echo site_url("assets/upload/logo/fix/medion.png") ?>" alt="thumb" class="img-fluid" />
                          </a>
                        </div>
                      </div>
                      <a href="#" style="color:#000000;">
                        <h5 class="font-weight-600 mb-0">
                          <?php echo "Medion  "; ?>
                        </h5>
                      </a>
                    </div>
                    <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
                      <div class="div-w-80 mr-3">
                        <div class="rotate-img">
                          <a href="#">
                            <img src="<?php echo site_url("assets/upload/logo/fix/orangtua.png") ?>" alt="thumb" class="img-fluid" />
                          </a>
                        </div>
                      </div>
                      <a href="#" style="color:#000000;">
                        <h5 class="font-weight-600 mb-0">
                          <?php echo "Orang Tua Group"; ?>
                        </h5>
                      </a>
                    </div>
                    <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
                      <div class="div-w-80 mr-3">
                        <div class="rotate-img">
                          <a href="#">
                            <img src="<?php echo site_url("assets/upload/logo/fix/PT_Astra_Komponen_Indonesia.jpg") ?>" alt="thumb" class="img-fluid" />
                          </a>
                        </div>
                      </div>
                      <a href="#" style="color:#000000;">
                        <h5 class="font-weight-600 mb-0">
                          <?php echo "PT Astra Komponen Indonesia"; ?>
                        </h5>
                      </a>
                    </div>
                    <br>
                    <a href="<?php echo site_url("halaman/list_company") ?>" class="mb-3">Click here to see all company list</a>
                  </div>
                  <div class="col-lg-4">
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="card-title">

                      </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
                      <div class="div-w-80 mr-3">
                        <div class="rotate-img">
                          <a href="#">
                            <img src="<?php echo site_url("assets/upload/logo/fix/PT_Yamaha_Motor_Part_Indonesia.png") ?>" alt="thumb" class="img-fluid" />
                          </a>
                        </div>
                      </div>
                      <a href="#" style="color:#000000;">
                        <h5 class="font-weight-600 mb-0">
                          <?php echo "PT Yamaha Motor Part Indonesia"; ?>
                        </h5>
                      </a>
                    </div>
                    <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
                      <div class="div-w-80 mr-3">
                        <div class="rotate-img">
                          <a href="#">
                            <img src="<?php echo site_url("assets/upload/logo/fix/PT_TK_Industrial_Indonesia.png") ?>" alt="thumb" class="img-fluid" />
                          </a>
                        </div>
                      </div>
                      <a href="#" style="color:#000000;">
                        <h5 class="font-weight-600 mb-0">
                          <?php echo "PT TK Industrial Indonesia"; ?>
                        </h5>
                      </a>
                    </div>
                    <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
                      <div class="div-w-80 mr-3">
                        <div class="rotate-img">
                          <a href="#">
                            <img src="<?php echo site_url("assets/upload/logo/fix/PT_Surya_Energi_Indonesia.png") ?>" alt="thumb" class="img-fluid" />
                          </a>
                        </div>
                      </div>
                      <a href="#" style="color:#000000;">
                        <h5 class="font-weight-600 mb-0">
                          <?php echo "PT Surya Energi Indonesia"; ?>
                        </h5>
                      </a>
                    </div>
                    <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
                      <div class="div-w-80 mr-3">
                        <div class="rotate-img">
                          <a href="#">
                            <img src="<?php echo site_url("assets/upload/logo/fix/Sharing_Vision.png") ?>" alt="thumb" class="img-fluid" />
                          </a>
                        </div>
                      </div>
                      <a href="#" style="color:#000000;">
                        <h5 class="font-weight-600 mb-0">
                          <?php echo "Sharing Vision"; ?>
                        </h5>
                      </a>
                    </div>
                    <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
                      <div class="div-w-80 mr-3">
                        <div class="rotate-img">
                          <a href="#">
                            <img src="<?php echo site_url("assets/upload/logo/fix/PT_Sterling_Tulus_Cemerlang.png") ?>" alt="thumb" class="img-fluid" />
                          </a>
                        </div>
                      </div>
                      <a href="#" style="color:#000000;">
                        <h5 class="font-weight-600 mb-0">
                          <?php echo "PT Sterling Tulus Cemerlang"; ?>
                        </h5>
                      </a>
                    </div>
                    <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
                      <div class="div-w-80 mr-3">
                        <div class="rotate-img">
                          <a href="#">
                            <img src="<?php echo site_url("assets/upload/logo/fix/PT_Sansan_Saudaratex_Jaya.jpg") ?>" alt="thumb" class="img-fluid" />
                          </a>
                        </div>
                      </div>
                      <a href="#" style="color:#000000;">
                        <h5 class="font-weight-600 mb-0">
                          <?php echo "PT Sansan Saudaratex Jaya.jpg"; ?>
                        </h5>
                      </a>
                    </div>
                    <br>
                  </div>
                  <div class="col-lg-4">
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="card-title">

                      </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
                      <div class="div-w-80 mr-3">
                        <div class="rotate-img">
                          <a href="#">
                            <img src="<?php echo site_url("assets/upload/logo/fix/PT_Laju_Makmur_Sentosa.png") ?>" alt="thumb" class="img-fluid" />
                          </a>
                        </div>
                      </div>
                      <a href="#" style="color:#000000;">
                        <h5 class="font-weight-600 mb-0">
                          <?php echo "PT Laju Makmur Sentosa"; ?>
                        </h5>
                      </a>
                    </div>
                    <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
                      <div class="div-w-80 mr-3">
                        <div class="rotate-img">
                          <a href="#">
                            <img src="<?php echo site_url("assets/upload/logo/fix/PT_Corebes_Inovasi_Indonesia.png") ?>" alt="thumb" class="img-fluid" />
                          </a>
                        </div>
                      </div>
                      <a href="#" style="color:#000000;">
                        <h5 class="font-weight-600 mb-0">
                          <?php echo "PT Corebes Inovasi Indonesia"; ?>
                        </h5>
                      </a>
                    </div>
                    <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
                      <div class="div-w-80 mr-3">
                        <div class="rotate-img">
                          <a href="#">
                            <img src="<?php echo site_url("assets/upload/logo/fix/PT_Catudaya_Prakarsa.jpg") ?>" alt="thumb" class="img-fluid" />
                          </a>
                        </div>
                      </div>
                      <a href="#" style="color:#000000;">
                        <h5 class="font-weight-600 mb-0">
                          <?php echo "PT Catudaya Prakarsa"; ?>
                        </h5>
                      </a>
                    </div>
                    <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
                      <div class="div-w-80 mr-3">
                        <div class="rotate-img">
                          <a href="#">
                            <img src="<?php echo site_url("assets/upload/logo/fix/PT_BGP_Indonesia.png") ?>" alt="thumb" class="img-fluid" />
                          </a>
                        </div>
                      </div>
                      <a href="#" style="color:#000000;">
                        <h5 class="font-weight-600 mb-0">
                          <?php echo "PT BGP Indonesia"; ?>
                        </h5>
                      </a>
                    </div>
                    <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
                      <div class="div-w-80 mr-3">
                        <div class="rotate-img">
                          <a href="#">
                            <img src="<?php echo site_url("assets/upload/logo/fix/PT_Dynacast.png") ?>" alt="thumb" class="img-fluid" />
                          </a>
                        </div>
                      </div>
                      <a href="#" style="color:#000000;">
                        <h5 class="font-weight-600 mb-0">
                          <?php echo "PT Dynacast.png"; ?>
                        </h5>
                      </a>
                    </div>
                    <br>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->
        <!-- <div class="row" data-aos="fade-up">
              <div class="col-sm-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-8">
                        <div class="card-title">
                          Company
                        </div>
                        <div class="row">
                          <div class="col-sm-6 grid-margin">
                            <div class="position-relative">
                              <div class="rotate-img">
                                <a href="<?php echo site_url("halaman/company_profile") ?>"><img
                                  src="<?php echo base_url() ?>assets/upload/logo/Roman Keramik.jpg"
                                  style="width:300px; height:200px;"
                                  alt="thumb"
                                  class="img-fluid"
                                /></a>
                              </div>
                              <div class="badge-positioned w-90">
                    
                              </div>
                            </div>
                          </div>

                          <div class="col-sm-6 grid-margin">
                            <div class="position-relative">
                              <div class="rotate-img">
                                <img
                                  src="<?php echo base_url() ?>assets/upload/logo/medion.png"
                                  style="width:250px; height:100px;"
                                  alt="thumb"
                                  class="img-fluid"
                                />
                              </div>
                              <div class="badge-positioned w-90">
                                
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-6 grid-margin">
                            <div class="position-relative">
                              <div class="rotate-img">
                                <img
                                  src="<?php echo base_url() ?>assets/upload/logo/orang tua group.png"
                                  alt="thumb"
                                  class="img-fluid"
                                />
                              </div>
                              <div class="badge-positioned w-90">
                                
                              </div>
                            </div>
                          </div>

                          <div class="col-sm-6 grid-margin">
                            <div class="position-relative">
                              <div class="rotate-img">
                                <img
                                  src="<?php echo base_url() ?>assets/upload/logo/PT Yamaha Motor Part Indonesia.png"
                                  style="width:200px; max-height:200px;"
                                  alt="thumb"
                                  class="img-fluid"
                                />
                              </div>
                              <div class="badge-positioned w-90">
                                <div
                                  class="d-flex justify-content-between align-items-center"
                                >
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div
                          class="d-flex justify-content-between align-items-center"
                        >
                          <div class="card-title">
                            List Company
                          </div>
                        </div>
                        <?php //foreach($company as $row){
                        ?>
                        <div
                          class="d-flex justify-content-between align-items-center border-bottom pb-2"
                        >
                          <div class="div-w-80 mr-3">
                            <div class="rotate-img">
                              <?php //if($row->logo_perusahaan){
                              ?>
                                <a href="<?php //echo site_url("halaman/company/".$row->id_perusahaan)
                                          ?>">
                                  <img
                                    src="<?php //echo site_url("assets/upload/logo/").$row->logo_perusahaan
                                          ?>"
                                    alt="thumb"
                                    class="img-fluid"
                                  />
                                </a>
                              <?php //}else{ 
                              ?>
                                <a href="<?php //echo site_url("halaman/company/".$row->id_perusahaan)
                                          ?>">
                                  <img
                                    src="<?php //echo site_url("assets/upload/logo/").$row->logo_perusahaan
                                          ?>"
                                    alt="thumb"
                                    class="img-fluid"
                                  />
                                </a>
                              <?php //} 
                              ?>
                            </div>
                          </div>
                          <a href="<?php //echo site_url('halaman/company/'.$row->id_perusahaan) 
                                    ?>" style="color:#000000;"><h4 class="font-weight-600 mb-0">
                            <?php //echo $row->nama_perusahaan ;
                            ?>
                          </h4></a>
                        </div>
                        <?php //} 
                        ?>
                        <br>
                        <a href="<?php// echo site_url("halaman/list_company") ?>" class="mb-3">Click here to see all company list</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
        <!-- main-panel ends -->
        <!-- container-scroller ends -->