<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CDC | ITENAS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" href="https://www.itenas.ac.id/wp-content/uploads/2020/01/cropped-logo_itenas_aja-1-192x192.png" sizes="192x192">


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url() ?>assets/home/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/home/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/home/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/home/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/home/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/home/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <link href="<?php echo base_url() ?>assets/home/assets/animatedmodal/css/animate.min.css" rel="stylesheet">



  <!-- Template Main CSS File -->
  <link href="<?php echo base_url() ?>assets/home/assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" />

  <!-- =======================================================
  * Template Name: Flexor - v2.4.0
  * Template URL: https://bootstrapmade.com/flexor-free-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <header id="header">
    <div class="container d-flex">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="<?php echo site_url() ?>"><img src="<?php echo site_url('assets/halaman/logo.png') ?>" alt=""></a></h1>
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="<?php echo site_url('halaman/jobfair_home') ?>">Home</a></li>
          <li><a href="#info">Information</a></li>
          <li><a href="#about">Event</a></li>
          <li><a href="<?php echo site_url('halaman/stand') ?>">Stand Company</a></li>
          <li><a href="#list">List Company</a></li>
          <li><a href="<?php echo site_url() ?>">Back to CDC</a></li>
          <?php if ($this->session->userdata("nama") != NULL) {
            if ($this->session->userdata('user')) { ?>
              <li class="drop-down"><a href="<?php echo site_url('user') ?>"><?php echo $this->session->userdata("nama") ?></a>
                <ul>
                  <li><a href="<?php echo site_url('user') ?>" class="nav-link">Check Profile</a></li>
                  <li><a href="<?php echo site_url("login/logout") ?>">Logout</a></li>
                </ul>
              </li>
            <?php } else if ($this->session->userdata('admin')) { ?>
              <li class="drop-down"><a href="<?php echo site_url('admin') ?>"><?php echo $this->session->userdata("nama") ?></a>
                <ul>
                  <li><a href="<?php echo site_url('admin') ?>" class="nav-link">Check Profile</a></li>
                  <li><a href="<?php echo site_url("login/logout") ?>">Logout</a></li>
                </ul>
              </li>
            <?php } else if ($this->session->userdata('perusahaan')) { ?>
              <li class="drop-down"><a href="<?php echo site_url('perusahaan') ?>"><?php echo $this->session->userdata("nama") ?></a>
                <ul>
                  <li><a href="<?php echo site_url('perusahaan') ?>" class="nav-link">Check Profile</a></li>
                  <li><a href="<?php echo site_url("login/logout") ?>">Logout</a></li>
                </ul>
              </li>
            <?php } ?>
          <?php } else { ?>
            <li><a href="<?php echo site_url('login') ?>">Login</a></li>
          <?php } ?>

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->
  <main id="main">