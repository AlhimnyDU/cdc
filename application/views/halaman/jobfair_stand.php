<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
    <div class="container">

        <div class="section-title">
            <h2 data-aos="fade-up">Stand Company</h2>
            <p data-aos="fade-up">Cari lowongan kerja perusahaan di JOB FAIR ITENAS 2021</p>
        </div>
        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            <?php foreach ($perusahaan as $row) { ?>
                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <a href="<?php echo base_url('halaman/estand/' . $row->id_perusahaan) ?>">
                        <video class="img-fluid" autoplay muted loop>
                            <source src="<?php echo base_url('assets/home/jobfair/' . $row->link) ?>" type="video/mp4">
                        </video>
                    </a>
                    <div class="portfolio-info">
                        <h6><?php echo $row->nama_perusahaan ?></h6>
                        <p><?php echo $row->bidang ?> </p>
                        <a href="<?php echo base_url('assets/home/jobfair/' . $row->link) ?>" data-vbtype="iframe" class="venobox preview-link" title="<?php echo $row->nama_perusahaan ?>"><i class="bx bx-plus"></i></a>
                        <a href="<?php echo base_url('halaman/estand/' . $row->id_perusahaan) ?>" class="details-link" title="More Details"><i class="fa fa-briefcase"></i></a>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
</section><!-- End Portfolio Section -->