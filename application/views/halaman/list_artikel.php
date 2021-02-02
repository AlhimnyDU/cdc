<section id="blog" class="blog">
  <div class="container">
    <div class="section-title" data-aos="fade-up">
      <h2>Recent News</h2>
    </div>
    <div class="row">
      <?php foreach ($artikel   as $row) { ?>
        <div class="col-lg-4  col-md-6 d-flex align-items-stretch" data-aos="fade-up">
          <article class="entry">
            <div class="entry-img">
              <img src="<?php echo base_url('assets/upload/post/' . $row->gambar) ?>" alt="" class="img-fluid">
            </div>
            <h2 class="entry-title">
              <a href="<?php echo site_url('halaman/artikel/' . $row->id_artikel) ?>"><?php echo $row->judul ?></a>
            </h2>
            <div class="entry-content">
              <p>
                <?php echo substr($row->konten, 0, 160) ?>
              </p>
              <div class="read-more">
                <a href="<?php echo site_url('halaman/artikel/' . $row->id_artikel) ?>">Read More</a>
              </div>
            </div>

          </article><!-- End blog entry -->
        </div>
      <?php } ?>
      <center>
        <?php echo $pagination; ?>
      </center>
    </div>
  </div>
</section><!-- End Blog Section -->