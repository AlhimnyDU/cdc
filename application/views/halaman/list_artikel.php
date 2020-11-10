<div class="content-wrapper">
  <div class="container">
		<div class="row aos-init aos-animate" data-aos="fade-up">
            <div class="row" data-aos="fade-up">
              <div class="col-lg-3 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h2>Category</h2>
                    <ul class="vertical-menu">
                      <li><a href="<?php echo site_url("halaman")?>">Home</a></li>
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
                  <?php foreach($artikel as $row){?>
                    <div class="row">
                      <div class="col-sm-4 grid-margin">
                        <div class="position-relative">
                          <div class="rotate-img">
                            <img
                              src="<?php echo site_url("assets/upload/post/").$row->gambar?>"
                              alt="thumb"
                              class="img-fluid"
                            />
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-8  grid-margin">
                        <a href="<?php echo site_url("halaman/artikel/".$row->id_artikel) ?>"><h2 class="mb-2 font-weight-600">
                            <?php echo $row->judul?>
                        </h2></a>
                        <div class="fs-13 mb-2">
                          <span class="mr-2">Post Date : </span> <?php echo date("d M Y",strtotime($row->created)) ?>
                        </div>
                        <div class="mb-0">
                            <?php echo substr($row->headline, 0, 150)?>..<a href="<?php echo site_url("halaman/artikel/".$row->id_artikel) ?>">See More</a>
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