<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>CDC | ITENAS</title>
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/home/css/style.css" type="text/css" />
        <link rel="icon" href="https://www.itenas.ac.id/wp-content/uploads/2020/01/cropped-logo_itenas_aja-1-192x192.png" sizes="192x192"> 
		<!--[if IE 6]>
			<link rel="stylesheet" href="css/ie6.css" type="text/css" />
		<![endif]-->
		<!--[if IE 7]>
			<link rel="stylesheet" href="css/ie7.css" type="text/css" />
		<![endif]-->
	</head>
	<body>
		<div class="header">
			<div>
				<a href="index.html" id="logo"><img src="<?php echo base_url() ?>assets/home/images/logo.png" alt="logo"/></a>
				<div class="navigation">
					<ul class="first">
						<li class="first"><a href="<?php echo site_url("login/perusahaan") ?>">Registrasi Perusahaan</a></li>
						<li><a href="<?php echo site_url("login") ?>">Registrasi Akun</a></li>
						<?php if($this->session->userdata('nama')){?>
						<li><a href="<?php echo site_url("login/logout") ?>">Logout</a></li>
						<?php }else{?>
						<li><a href="<?php echo site_url("login") ?>">Login</a></li>
						<?php } ?>
					</ul>
				</div>
				<?php if($this->session->userdata('nama')){?>
					<div style="position: absolute; margin-top: 80px; right: 0px; width: 300px; padding: 10px; font-family:sans-serif;">Selamat datang, <?php echo $this->session->userdata('nama'); ?></div>
				<?php } ?>
						
				<!-- <form action="" class="search">
					<input type="text" value="search" onblur="this.value=!this.value?'search':this.value;" onfocus="this.select()" onclick="this.value='';"/>
					<input type="submit" id="submit" value=""/>
				</form> -->
			</div>
			<div id="navigation">
				<ul>
					<li class="<?php if($this->session->userdata('navbar')=='beranda'){ echo "selected";}?>"><a href="<?php echo site_url("halaman") ?>">Beranda</a></li>
					<li class="<?php if($this->session->userdata('navbar')=='loker'){ echo "selected";}?>"><a href="<?php echo site_url("halaman/loker") ?>">Lowongan Kerja</a></li>
					<li class="<?php if($this->session->userdata('navbar')=='info'){ echo "selected";}?>"><a href="<?php echo site_url("halaman/info") ?>">Informasi</a></li>
					<li class="<?php if($this->session->userdata('navbar')=='about'){ echo "selected";}?>"><a href="<?php echo site_url("halaman/about") ?>">Tentang Kami</a></li>
					<li><a href="https://tracerstudy.itenas.ac.id/cdc/">Tracer Study</a></li>
				</ul>
			</div>
		</div>