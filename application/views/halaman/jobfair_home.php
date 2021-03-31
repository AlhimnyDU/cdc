<style>
    #link1 {
        margin: 15% 10px 0;
        position: absolute;
        padding: 150px 120px;
    }

    #link2 {
        margin: 15% 280px 0;
        position: absolute;
        padding: 130px 80px;
    }

    #link3 {
        margin: 18% 780px 0;
        position: absolute;
        padding: 100px 60px;
    }

    #link4 {
        margin: 18% 930px 0;
        position: absolute;
        padding: 100px 60px;
    }

    #link5 {
        margin: 28% 1120px 0;
        position: absolute;
        padding: 60px 150px;
    }

    @media (max-width: 360px) {
        #link1 {
            margin: 2% 50px 0;
            position: absolute;
            padding: 150px 100px;
        }

        #link2 {
            margin: 15% 350px 0;
            position: absolute;
            padding: 150px 100px;
        }

        #link3 {
            margin: 18% 990px 0;
            position: absolute;
            padding: 100px 60px;
        }

        #link4 {
            margin: 18% 1150px 0;
            position: absolute;
            padding: 100px 60px;
        }

        #link5 {
            margin: 28% 1400px 0;
            position: absolute;
            padding: 60px 180px;
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
            </div>
            <div style="position: absolute; height: 100%; bottom: 0; width: 100%;padding: 20px;">
                <a id="link1" href="#list"></a>
                <a id="link2" href="#info"></a>
                <a id="link3" href="#about"></a>
                <a id="link4" href="<?php echo site_url('halaman/stand') ?>"></a>
                <a id="link5" href="<?php echo site_url('halaman/daftar_peserta') ?>"></a>

            </div>
            <div id="guide" style="position: absolute; height: 100%; bottom: 0; background: rgba(0, 0, 0, 0.5); color: #f1f1f1; width: 100%;padding: 20px;">
                <center>
                    <a id="close"><i class="fa fa-times-circle" style="color: silver; font-size: 30px;"></i></a>
                </center>
                <img style="width: 100%;" src="<?php echo base_url() ?>assets/home/jobfair/guide.png" alt="">
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

                <div class="icon-box" data-aos="fade-up">
                    <div class="icon"><i class="bx bx-fingerprint"></i></div>
                    <h4 class="title"><a href="">Psikotest Online</a></h4>
                    <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                </div>

                <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon"><i class="bx bx-gift"></i></div>
                    <h4 class="title"><a href="">Workshop Karir</a></h4>
                    <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
                </div>

                <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon"><i class="bx bx-atom"></i></div>
                    <h4 class="title"><a href="">Webinar Scholarship</a></h4>
                    <p class="description">Explicabo est voluptatum asperiores consequatur magnam. Et veritatis odit. Sunt aut deserunt minus aut eligendi omnis</p>
                </div>

                <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon"><i class="bx bx-images"></i></div>
                    <h4 class="title"><a href="">Lowongan Kerja</a></h4>
                    <p class="description">Explicabo est voluptatum asperiores consequatur magnam. Et veritatis odit. Sunt aut deserunt minus aut eligendi omnis</p>
                </div>

            </div>
        </div>

    </div>
</section><!-- End About Section -->
<section id="values" class="values">
    <div class="container">

        <div class="row">
            <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                <div class="card" style="background-image: url(<?php echo base_url() ?>assets/home/jobfair/Oranye.png);">
                    <div class="card-body">
                        <h5 class="card-title"><a href="<?php echo base_url('halaman/stand') ?>">Stand</a></h5>
                        <p class="card-text">Menelusuri stand - stand perusahaan dapat melihat profil perusahaan dan lowongan pekerjaan yang di virtual jobfair itenas 2021</p>
                        <div class="read-more"><a href="<?php echo base_url('halaman/stand') ?>"><i class="icofont-arrow-right"></i> See more</a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="100">
                <div class="card" style="background-image: url(<?php echo base_url() ?>assets/home/jobfair/Oranye.png);;">
                    <div class="card-body">
                        <h5 class="card-title"><a href="#about>">Event</a></h5>
                        <p class="card-text">Melihat event - event yang dilaksanakan pada virtual jobfair itenas 2021</p>
                        <div class="read-more"><a href="#about"><i class="icofont-arrow-right"></i> Read More</a></div>
                    </div>
                </div>

            </div>
            <div class="col-md-6 d-flex align-items-stretch mt-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card" style="background-image: url(<?php echo base_url() ?>assets/home/jobfair/Oranye.png);">
                    <div class="card-body">
                        <h5 class="card-title"><a href="#info">Information</a></h5>
                        <p class="card-text">Melihat informasi dan berita seputar virtual jobfair dan CDC itenas</p>
                        <div class="read-more"><a href="#info"><i class="icofont-arrow-right"></i> Read More</a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-stretch mt-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card" style="background-image: url(<?php echo base_url() ?>assets/home/jobfair/Oranye.png);">
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
            <img src="<?php echo base_url() ?>assets/home/assets/img/clients/client-1.png" alt="">
            <img src="<?php echo base_url() ?>assets/home/assets/img/clients/client-2.png" alt="">
            <img src="<?php echo base_url() ?>assets/home/assets/img/clients/client-3.png" alt="">
            <img src="<?php echo base_url() ?>assets/home/assets/img/clients/client-4.png" alt="">
            <img src="<?php echo base_url() ?>assets/home/assets/img/clients/client-5.png" alt="">
            <img src="<?php echo base_url() ?>assets/home/assets/img/clients/client-6.png" alt="">
            <img src="<?php echo base_url() ?>assets/home/assets/img/clients/client-7.png" alt="">
            <img src="<?php echo base_url() ?>assets/home/assets/img/clients/client-8.png" alt="">
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