        <!-- partial -->
        <div class="flash-news-banner">
          <div class="container">
            <div class="d-lg-flex align-items-center justify-content-between">
              <div class="d-flex align-items-center">
                <span class="badge badge-danger mr-3">Head line news</span>
                <p class="mb-0">
                 <?php echo substr($main_artikel->headline, 0, 100)?>..<a href="<?php echo site_url("halaman/artikel/".$main_artikel->id_artikel) ?>">See More</a>
                </p>
              </div>
              <div class="d-flex">
                <span class="mb-0 text-danger"><?php echo date("l")?>,</span>
                <span class="mb-0 text-danger"><?php echo date("d F Y")?></span>
              </div>
            </div>
          </div>
        </div>
        <div class="row" style="background-color:#DD571C;margin-bottom:10px;" data-aos="fade-up">
            <div class="col-sm-12 grid-margin" style="margin-top:10px">
              <center><h2 style="color:#EFEFEF">Registration Job Fair Countdown</h2></center>
              <center><div id="pendaftaran" class="flipdown"></div></center>
            </div>
        </div>
        <div class="content-wrapper">
          <div class="container">
            <div class="row" data-aos="fade-up">
              <div class="col-xl-12 stretch-card grid-margin">
                <div class="position-relative">
                  <ul class="rslides">
                    <li>
                      <img src="<?php echo site_url('assets/halaman/slideshow/bg1.jpeg') ?>" alt="banner" class="img-fluid"/>
                      <div class="banner-content">
                        <div class="badge badge-danger fs-12 font-weight-bold mb-3">
                          Biro Kemahasiswaan & Alumni Itenas
                        </div>
                        <h1 class="mb-0">Career Devolopment Center</h1>
                        <h1 class="mb-2">
                          Web Ini Berisikan Informasi Karir, Lowongan Kerja, dan Event yang berhubungan dengan karir
                        </h1>
                      </div>
                    </li>
                    <li>
                      <img src="<?php echo site_url('assets/halaman/slideshow/bg2.jpeg') ?>" alt="banner" class="img-fluid">
                      <div class="banner-content">
                        <div class="badge badge-danger fs-12 font-weight-bold mb-3">
                          Biro Kemahasiswaan & Alumni Itenas
                        </div>
                        <h1 class="mb-0">Career Devolopment Center</h1>
                        <h1 class="mb-2">
                          Web Ini Berisikan Informasi Karir, Lowongan Kerja, dan Event yang berhubungan dengan karir
                        </h1>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>    
            <div class="row" data-aos="fade-up">
              <div class="col-xl-8 stretch-card grid-margin">
                <div class="position-relative">
                  <img
                    src="<?php echo base_url('assets/upload/post/'.$main_artikel->gambar) ?>"
                    alt="banner"
                    class="img-fluid"
                  />
                  <div class="banner-content">
                        <div class="badge badge-danger fs-12 font-weight-bold mb-3">
                          New Post
                        </div>
                        <h1 class="mb-0"><div class="badge badge-dark">Career Devolopment Center</div></h1>
                        <p class="mb-2">
                        <div class="badge badge-dark">C<?php echo substr($main_artikel->headline, 0, 150)?>...<a style="color:white;" href="<?php echo site_url("halaman/artikel/".$main_artikel->id_artikel) ?>"></div><div class="badge badge-info fs-12 font-weight-bold mb-3">See More</div></a>
                        </p>
                      </div>
                </div>
              </div>
              <div class="col-xl-4 stretch-card grid-margin">
                <div class="card bg-dark text-white">
                  <div class="card-body">
                    <h2>Latest news</h2>
                    <?php foreach($artikel   as $row){?>
                    <div
                      class="d-flex border-bottom-blue pt-3 pb-4 align-items-center justify-content-between"
                    >
                      <div class="pr-3">

                        <a style="color:#EFEFEF;" href="<?php echo site_url('halaman/artikel/'.$row->id_artikel) ?>"><h5><?php echo $row->judul ?></h5></a>
                        <div class="fs-12">
                          <span class="mr-2">Post Date : </span><?php echo date("d M Y",strtotime($row->created)) ?>
                        </div>
                      </div>
                      <div class="rotate-img">
                        <img
                          src="<?php echo base_url('assets/upload/post/'.$row->gambar) ?>"
                          alt="thumb"
                          class="img-fluid img-lg"
                        />
                      </div>
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="row" data-aos="fade-up">
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
                  <?php foreach($vacancy as $row){?>
                    <div class="row">
                      <div class="col-sm-4 grid-margin">
                        <div class="position-relative">
                          <div class="rotate-img">
                            <a href="<?php echo site_url("halaman/company/".$row->id_perusahaan)?>">
                              <img
                                src="<?php echo site_url("assets/upload/logo/").$row->logo_perusahaan?>"
                                alt="thumb"
                                class="img-fluid"
                              />
                            </a>
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
                          <span class="mr-2" style="color:red">Deadline : <?php echo date("d M Y",strtotime($row->deadline))?></span>
                        </div>
                        <div class="fs-13 mb-2">
                          <span class="mr-2">Location : </span> <?php echo $row->lokasi?>
                        </div>
                        <p class="mb-0">
                          <?php echo substr($row->deskripsi, 0, 160)?>..<a href="<?php echo site_url("halaman/job/".$row->id_loker) ?>">See More</a>
                        </p>
                      </div>
                    </div>
                  <?php } ?>
                  <div style="margin-left:500px;"><a href="<?php echo site_url("halaman/loker") ?>" class="mb-3">Click here to see all job vacancy list</a></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row" data-aos="fade-up">
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
                        <?php foreach($company as $row){?>
                        <div
                          class="d-flex justify-content-between align-items-center border-bottom pb-2"
                        >
                          <div class="div-w-80 mr-3">
                            <div class="rotate-img">
                              <?php if($row->logo_perusahaan){?>
                                <a href="<?php echo site_url("halaman/company/".$row->id_perusahaan)?>">
                                  <img
                                    src="<?php echo site_url("assets/upload/logo/").$row->logo_perusahaan?>"
                                    alt="thumb"
                                    class="img-fluid"
                                  />
                                </a>
                              <?php }else{ ?>
                                <a href="<?php echo site_url("halaman/company/".$row->id_perusahaan)?>">
                                  <img
                                    src="<?php echo site_url("assets/upload/logo/").$row->logo_perusahaan?>"
                                    alt="thumb"
                                    class="img-fluid"
                                  />
                                </a>
                              <?php } ?>
                            </div>
                          </div>
                          <a href="<?php echo site_url('halaman/company/'.$row->id_perusahaan) ?>" style="color:#000000;"><h4 class="font-weight-600 mb-0">
                            <?php echo $row->nama_perusahaan ;?>
                          </h4></a>
                        </div>
                        <?php } ?>
                        <br>
                        <a href="<?php echo site_url("halaman/list_company") ?>" class="mb-3">Click here to see all company list</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        <!-- main-panel ends -->
        <!-- container-scroller ends -->