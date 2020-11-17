<div class="content-wrapper">
  <div class="container">
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
                             <?php if(empty($row->logo_perusahaan)){?>
                            <a href="<?php echo site_url("halaman/company/".$row->id_perusahaan)?>">
                              <img
                                src="<?php echo site_url("assets/upload/logo/default.png")?>"
                                alt="thumb"
                                class="img-fluid"
                              />
                            </a>
                            <?php }else{?>
                            <a href="<?php echo site_url("halaman/company/".$row->id_perusahaan)?>">
                              <img
                                src="<?php echo site_url("assets/upload/logo/").$row->logo_perusahaan?>"
                                alt="thumb"
                                class="img-fluid"
                              />
                            </a>
                            <?php }?>
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