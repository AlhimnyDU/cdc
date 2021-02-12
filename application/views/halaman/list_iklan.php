<section id="blog" class="blog">
  <div class="container">
    <div class="section-title" data-aos="fade-up">
      <h2>Iklan Lowongan</h2>
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
    <center>
      <?php echo $pagination; ?>
    </center>
  </div>
</section><!-- End Blog Section -->