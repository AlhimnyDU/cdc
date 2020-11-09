
<div class="content-wrapper">
        <div class="row" style="background-color:#DD571C;margin-bottom:10px;" data-aos="fade-up">
            <div class="col-sm-12 grid-margin" style="margin-top:10px">
              <center><h2 style="color:#EFEFEF">Registration Job Fair Countdown</h2></center>
              <center><div id="pendaftaran" class="flipdown"></div></center>
            </div>
        </div>
    <div class="container">
              <div class="row" data-aos="fade-up">
                <div class="col-xl-12 stretch-card grid-margin">
                  <div class="position-relative">
                        <img src="<?php echo base_url() ?>assets/halaman/slideshow/banner (4).jpeg" alt="banner" class="img-fluid">
                        <div class="banner-content">
                          <div class="badge badge-danger fs-12 font-weight-bold mb-3">
                            Biro Kemahasiswaan & Alumni Itenas
                          </div>
                          <h1 class="mb-0">Career Devolopment Center</h1>
                          <h1 class="mb-2">
                            Web Ini Berisikan Informasi Karir, Lowongan Kerja, dan Event yang berhubungan dengan karir
                          </h1>
                        </div>
                  </div>
                </div>
              </div>
            <div class="row" data-aos="fade-up">
              <div class="col-sm-12 grid-margin">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">
                      <h3>Participate Company</h3>  
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
                          <div class="div-w-80 mr-3">
                            <div class="rotate-img">
                              <img
                                src="<?php echo base_url() ?>assets/halaman/assets/images/dashboard/gojek.png"
                                alt="thumb"
                                class="img-fluid"
                              />
                            </div>
                          </div>
                          <h3 class="font-weight-600 mb-0">
                            Apple Introduces Apple Watch
                          </h3>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="d-flex justify-content-between align-items-center">
                          
                        </div>
                        <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
                          <div class="div-w-80 mr-3">
                            <div class="rotate-img">
                              <img
                                src="<?php echo base_url() ?>assets/halaman/assets/images/dashboard/gojek.png"
                                alt="thumb"
                                class="img-fluid"
                              />
                            </div>
                          </div>
                          <h3 class="font-weight-600 mb-0">
                            Apple Introduces Apple Watch
                          </h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
		      <div class="row aos-init aos-animate" data-aos="fade-up">
            <div class="row" data-aos="fade-up">
              <div class="col-lg-3 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h2>Category</h2>
                    <ul class="vertical-menu">
                      <li><a href="<?php echo site_url("halaman/loker")?>">Vacancy</a></li>
                      <li><a href="<?php echo site_url("halaman/jobfair")?>">Job Fair</a></li>
                      <li><a href="<?php echo site_url("halaman/magang")?>">Magang</a></li>
                      <li><a href="<?php echo site_url("halaman/beasiswa")?>">Beasiswa</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-9 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                  <?php foreach($vacancy as $row){?>
                    <div class="row">
                      <div class="col-sm-4 grid-margin">
                        <div class="position-relative">
                          <div class="rotate-img">
                            <img
                              src="<?php echo site_url("assets/upload/logo/").$row->logo_perusahaan?>"
                              alt="thumb"
                              class="img-fluid"
                            />
                          </div>
                          <div class="badge-positioned">
                            <span class="badge badge-danger font-weight-bold"
                              ><?php echo $row->jenis?></span
                            >
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-8  grid-margin">
                        <a href="<?php echo site_url("halaman/job/".$row->id_loker) ?>"><h2 class="mb-2 font-weight-600">
                          <?php echo $row->posisi?>
                        </h2></a>
                        <div class="fs-13 mb-2">
                          <span class="mr-2">Deadline : </span> <?php echo date("d M Y",strtotime($row->deadline))?>
                        </div>
                        <div class="fs-13 mb-2">
                          <span class="mr-2">Location : </span> <?php echo $row->lokasi?>
                        </div>
                        <p class="mb-0">
                          <?php echo substr($row->deskripsi, 0, 150)?>..<a href="<?php echo site_url("halaman/job/".$row->id_loker) ?>">See More</a>
                        </p>
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
<!-- partial:partials/_footer.html -->
<footer>  
          <div class="footer-bottom">
            <div class="container">
              <div class="row">
                <div class="col-sm-12">
                  <div class="d-sm-flex justify-content-between align-items-center">
                    <div class="fs-14 font-weight-600">
                      © <?php echo date("Y") ?> @ <a href="https://www.bootstrapdash.com/" target="_blank" > Career Development Center</a>. All rights reserved.
                    </div>
                    <div class="fs-14 font-weight-600">
                      Created by <a href="https://www.bootstrapdash.com/" target="_blank">@alhimnydu</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </footer>

        <!-- partial -->
      </div>
    </div>
    <!-- inject:js -->
    <script src="<?php echo base_url() ?>assets/halaman/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="<?php echo base_url() ?>assets/halaman/assets/vendors/aos/dist/aos.js/aos.js"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="<?php echo base_url() ?>assets/halaman/assets/js/demo.js"></script>
    <script src="<?php echo base_url() ?>assets/halaman/assets/js/jquery.easeScroll.js"></script>
    <!-- End custom js for this page-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/halaman/rslides/responsiveslides.min.js"></script>
    <script src="<?php echo base_url() ?>assets/halaman/flipdown/flipdown.js"></script>
    <script>
      $(function() {
        $(".rslides").responsiveSlides({
          auto: true,       
          speed: 500  
        });
      });
    </script>
    <script>
      var tm = new Date("2020/12/01");
      var flipdown =  new FlipDown(tm.getTime() / 1000, "pendaftaran", {
            theme: "dark",
        }).start();
    </script>
  </body>
</html>