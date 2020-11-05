<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>CDC | ITENAS</title>
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/home/css/style.css" type="text/css" />
        <link rel="icon" href="https://www.itenas.ac.id/wp-content/uploads/2020/01/cropped-logo_itenas_aja-1-192x192.png" sizes="192x192">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/home/src/flipdown.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/home/src/responsiveslides.css">
		<style>
			.rslides {
			margin: 0 auto;
			}

			.rslides_container {
			margin-bottom: 50px;
			position: relative;
			float: left;
			width: 100%;
			}

			.centered-btns_nav {
			z-index: 3;
			position: absolute;
			-webkit-tap-highlight-color: rgba(0,0,0,0);
			top: 50%;
			left: 0;
			opacity: 0.7;
			text-indent: -9999px;
			overflow: hidden;
			text-decoration: none;
			height: 61px;
			width: 38px;
			background: transparent url("themes.gif") no-repeat left top;
			margin-top: -45px;
			}

			.centered-btns_nav:active {
			opacity: 1.0;
			}

			.centered-btns_nav.next {
			left: auto;
			background-position: right top;
			right: 0;
			}

			.transparent-btns_nav {
			z-index: 3;
			position: absolute;
			-webkit-tap-highlight-color: rgba(0,0,0,0);
			top: 0;
			left: 0;
			display: block;
			background: #fff; /* Fix for IE6-9 */
			opacity: 0;
			filter: alpha(opacity=1);
			width: 48%;
			text-indent: -9999px;
			overflow: hidden;
			height: 91%;
			}

			.transparent-btns_nav.next {
			left: auto;
			right: 0;
			}

			.large-btns_nav {
			z-index: 3;
			position: absolute;
			-webkit-tap-highlight-color: rgba(0,0,0,0);
			opacity: 0.6;
			text-indent: -9999px;
			overflow: hidden;
			top: 0;
			bottom: 0;
			left: 0;
			background: #000 url("themes.gif") no-repeat left 50%;
			width: 38px;
			}

			.large-btns_nav:active {
			opacity: 1.0;
			}

			.large-btns_nav.next {
			left: auto;
			background-position: right 50%;
			right: 0;
			}

			.centered-btns_nav:focus,
			.transparent-btns_nav:focus,
			.large-btns_nav:focus {
			outline: none;
			}

			.centered-btns_tabs,
			.transparent-btns_tabs,
			.large-btns_tabs {
			margin-top: 10px;
			text-align: center;
			}

			.centered-btns_tabs li,
			.transparent-btns_tabs li,
			.large-btns_tabs li {
			display: inline;
			float: none;
			_float: left;
			*float: left;
			margin-right: 5px;
			}

			.centered-btns_tabs a,
			.transparent-btns_tabs a,
			.large-btns_tabs a {
			text-indent: -9999px;
			overflow: hidden;
			-webkit-border-radius: 15px;
			-moz-border-radius: 15px;
			border-radius: 15px;
			background: #ccc;
			background: rgba(0,0,0, .2);
			display: inline-block;
			_display: block;
			*display: block;
			-webkit-box-shadow: inset 0 0 2px 0 rgba(0,0,0,.3);
			-moz-box-shadow: inset 0 0 2px 0 rgba(0,0,0,.3);
			box-shadow: inset 0 0 2px 0 rgba(0,0,0,.3);
			width: 9px;
			height: 9px;
			}

			.centered-btns_here a,
			.transparent-btns_here a,
			.large-btns_here a {
			background: #222;
			background: rgba(0,0,0, .8);
			}
		</style>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/home/src/flipdown.js"></script>
    	<script type="text/javascript" src="<?php echo base_url() ?>assets/home/src/main.js"></script>
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
						<?php if($this->session->userdata('nama')){?>
						<li class="first"><a href="<?php echo site_url("perusahaan") ?>">Cek Profil</a></li>
						<li><a href="<?php echo site_url("login/logout") ?>">Logout</a></li>
						<?php }else{?>
						<li class="first"><a href="<?php echo site_url("login/perusahaan") ?>">Registrasi Perusahaan</a></li>
						<li><a href="<?php echo site_url("login") ?>">Registrasi Akun</a></li>
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