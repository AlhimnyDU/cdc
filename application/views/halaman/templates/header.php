<!DOCTYPE html>
<html lang="zxx">

<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>CDC | ITENAS</title>
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/halaman/assets/vendors/mdi/css/materialdesignicons.min.css" />
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/halaman/assets/vendors/aos/dist/aos.css/aos.css" />

  <!-- End plugin css for this page -->
  <link rel="icon" href="https://www.itenas.ac.id/wp-content/uploads/2020/01/cropped-logo_itenas_aja-1-192x192.png" sizes="192x192">

  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/halaman/assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/halaman/rslides/responsiveslides.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/halaman/flipdown/flipdown.css">
  <!-- Datatables -->
  <link href="<?php echo base_url() ?>assets/admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/admin/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/admin/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/admin/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/admin/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
  <!-- endinject -->
</head>

<body>
  <div class="container-scroller">
    <div class="main-panel">
      <!-- partial:partials/_navbar.html -->
      <header id="header">
        <div class="container">
          <nav class="navbar navbar-expand-lg navbar-light">
            <div class="navbar-top">
              <div class="d-flex justify-content-between align-items-center">
                <ul class="navbar-top-left-menu">
                </ul>
                <ul class="navbar-top-right-menu">
                  <li class="nav-item">

                  </li>
                  <li class="nav-item">
                    <?php if ($this->session->userdata("nama") != NULL) { ?>
                      <a href="" class="nav-link"><?php echo $this->session->userdata('nama'); ?></a>
                    <?php } else { ?>
                      <a href="<?php echo site_url("login") ?>" class="nav-link">Login</a>
                    <?php } ?>
                  </li>
                  <li class="nav-item">
                    <?php if ($this->session->userdata('nama') != NULL) {
                      if ($this->session->userdata('user')) { ?>
                        <a href="<?php echo site_url('user') ?>" class="nav-link">Check Profile</a>
                      <?php } else if ($this->session->userdata('admin')) { ?>
                        <a href="<?php echo site_url('admin') ?>" class="nav-link">Check Profile</a>
                      <?php } else if ($this->session->userdata('perusahaan')) { ?>
                        <a href="<?php echo site_url('perusahaan') ?>" class="nav-link">Check Profile</a>
                      <?php } ?>
                    <?php } else { ?>
                      <a href="<?php echo site_url("login") ?>" class="nav-link">Registrasi</a>
                    <?php } ?>
                  </li>
                  <li class="nav-item">
                    <?php if ($this->session->userdata("nama") != NULL) { ?>
                      <a href="<?php echo site_url("login/logout") ?>" class="nav-link">Logout</a>
                    <?php } else { ?>
                      <a href="<?php echo site_url("login/register") ?>" class="nav-link">Registrasi Perusahaan</a>
                    <?php } ?>
                  </li>
                </ul>
              </div>
            </div>
            <div class="navbar-bottom">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <a class="navbar-brand" href="#"><img src="<?php echo base_url() ?>assets/halaman/logo.png" alt="" /></a>
                </div>
                <div>
                  <button class="navbar-toggler" type="button" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="navbar-collapse justify-content-center collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-lg-flex justify-content-between align-items-center">
                      <li>
                        <button class="navbar-close">
                          <i class="mdi mdi-close"></i>
                        </button>
                      </li>
                      <li class="nav-item active">
                        <a class="nav-link" href="<?php echo site_url("halaman") ?>">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url("halaman/loker") ?>">Vacancy</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url("halaman/info") ?>">Information & Event</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url("halaman/list_company") ?>">Company</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url("halaman/jobfair") ?>">Job Fair</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="https://tracerstudy.itenas.ac.id/cdc">Tracer Study</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url("halaman/carrer") ?>">Career Counseling</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url("halaman/about") ?>">About Us</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <ul class="social-media">
                  <li>
                    <a href="https://www.youtube.com/channel/UCXNl5jOSO9os1nOr40oizXg">
                      <i class="mdi mdi-youtube"></i>
                    </a>
                  </li>
                  <li>
                    <a href="https://www.instagram.com/cdc.itenas/?hl=en">
                      <i class="mdi mdi-instagram"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </header>