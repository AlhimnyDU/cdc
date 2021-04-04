<style>
    .toolbar {
        position: absolute;
        right: 10px;
        bottom: 20px;
    }

    .myBtn {
        width: 200px;
        font-size: 18px;
        padding: 10px;
        border: none;
        background: #e48118;
        color: #fff;
        cursor: pointer;
    }

    .myBtn:hover {
        background: #ddd;
        color: black;
    }

    @media (max-width: 767px) {
        .myBtn {
            width: 50px;
            font-size: 10px;
            padding: 10px;
            border: none;
            background: #e48118;
            color: #fff;
            cursor: pointer;
        }
    }

    @media (max-width: 450px) {
        .myBtn {
            width: 50px;
            font-size: 8px;
            padding: 2px;
            border: none;
            background: #e48118;
            color: #fff;
            cursor: pointer;
        }
    }
</style>
<section id="breadcrumbs" class="breadcrumbs">
    <div id="carouselExampleSlidesOnly" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <video id="myVideo" style="width: 100%;" autoplay muted loop>
                    <source src="<?php echo base_url() ?>assets/home/jobfair/ruang_utama.mp4" type="video/mp4">
                </video>
                <div class="toolbar">
                    <a class="myBtn" href="#list">List Company</a>
                    <a class="myBtn" href="#info">Information</a>
                    <a class="myBtn" href="#about">Event</a>
                    <a class="myBtn" href="<?php echo site_url('halaman/stand') ?>">Stand Company</a>
                    <a class="myBtn" href="<?php echo site_url('halaman/daftar_peserta') ?>">Registration</a>
                </div>
            </div>
        </div>
</section><!-- End Breadcrumbs -->
<section id="about" class="about section-bg">
    <div class="container">

        <div class="row">
            <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch" data-aos="fade-right">
            </div>

            <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
                <h4 data-aos="fade-up">About this event</h4>
                <h3 data-aos="fade-up">Virtual Jobfair Itenas 2021</h3>
                <p data-aos="fade-up" align="justify">Virtual Job Fair Itenas Tahun 2021 merupakan sebuah kegiatan yang bertujuan sebagai mediator antara perusahaan/instansi/industri pencari kerja dan para pencari tenaga kerja. Selain itu, kegiatan ini diadakan sebagai ajang untuk membantu dan memfasilitasi para lulusan/alumni Itenas yang baru diwisuda dan yang belum mendapatkan pekerjaan serta para lulusan dari perguruan tinggi di wilayah Bandung dan sekitarnya. Kegiatan ini akan diadakan dari mulai tanggal 5 - 9 April 2021 dengan berbagai rangkaian acara lainnya dari mulai webinar scholarship, workshop karir hingga psikotes online</p>
                <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon"><i class="bx bx-atom"></i></div>
                    <h4 class="title"><a href="">Webinar Scholarship</a></h4>
                    <p class="description">29 - 31 Maret 2021</p>
                </div>
                <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon"><i class="bx bx-gift"></i></div>
                    <h4 class="title"><a href="">Workshop Career</a></h4>
                    <p class="description">5 April 2021</p>
                </div>
                <div class="icon-box" data-aos="fade-up">
                    <div class="icon"><i class="bx bx-fingerprint"></i></div>
                    <h4 class="title"><a href="">Psikotest Online</a></h4>
                    <p class="description">6 April 2021</p>
                </div>
                <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon"><i class="bx bx-images"></i></div>
                    <h4 class="title"><a href="">Presentation Company</a></h4>
                    <p class="description"> 7 - 8 April 2021</p>
                </div>

            </div>
        </div>

    </div>
</section><!-- End About Section -->
<section id="values" class="values">
    <div class="container">

        <div class="row">
            <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                <div class="card" style="background-image: url(<?php echo base_url() ?>assets/home/jobfair/oranye.png);">
                    <div class="card-body">
                        <h5 class="card-title"><a href="<?php echo base_url('halaman/stand') ?>">Stand</a></h5>
                        <p class="card-text">Menelusuri stand - stand perusahaan dapat melihat profil perusahaan dan lowongan pekerjaan yang di virtual jobfair itenas 2021</p>
                        <div class="read-more"><a href="<?php echo base_url('halaman/stand') ?>"><i class="icofont-arrow-right"></i> See more</a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="100">
                <div class="card" style="background-image: url(<?php echo base_url() ?>assets/home/jobfair/oranye.png);">
                    <div class="card-body">
                        <h5 class="card-title"><a href="#about>">Event</a></h5>
                        <p class="card-text">Melihat event - event yang dilaksanakan pada virtual jobfair itenas 2021</p>
                        <div class="read-more"><a href="#about"><i class="icofont-arrow-right"></i> Read More</a></div>
                    </div>
                </div>

            </div>
            <div class="col-md-6 d-flex align-items-stretch mt-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card" style="background-image: url(<?php echo base_url() ?>assets/home/jobfair/oranye.png);">
                    <div class="card-body">
                        <h5 class="card-title"><a href="#info">Information</a></h5>
                        <p class="card-text">Melihat informasi dan berita seputar virtual jobfair dan CDC itenas</p>
                        <div class="read-more"><a href="#info"><i class="icofont-arrow-right"></i> Read More</a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-stretch mt-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card" style="background-image: url(<?php echo base_url() ?>assets/halaman/jobfair/oranye.png);">
                    <div class="card-body">
                        <h5 class="card-title"><a href="#list">List Company</a></h5>
                        <p class="card-text">Menelusuri perusahaan - perusahaan yang mengikuti virtual jobfair itenas 2021</p>
                        <div class="read-more"><a href="#list"><i class="icofont-arrow-right"></i> Read More</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="list" class="clients section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title" data-aos="fade-up">
            <h2>List Company</h2>
        </div>
        <div class="owl-carousel clients-carousel">
            <?php foreach ($mengikuti as $row) { ?>
                <img src="<?php echo base_url('assets/upload/logo/' . $row->logo_perusahaan) ?>" class="img-fluid" alt="">
            <?php } ?>
        </div>
    </div>
</section><!-- End Clients Section -->
<section id="info" class="blog">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Information</h2>
            <p data-aos="fade-up" class="aos-init aos-animate">See all info & news in page <a href="<?php echo site_url("halaman/loker") ?>" class="mb-3">Information</a></p>
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