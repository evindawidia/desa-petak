<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />


	<link rel="shortcut icon" href="<?php echo base_url(); ?>public/assets/images/logokab.png">
	<title>Desa Petak - Mojokerto</title>

	<!-- Bootstrap Core CSS -->
	<link href="<?php echo base_url(); ?>public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>public/assets/vendor/fontawesome/css/font-awesome.min.css" type="text/css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>public/assets/vendor/animateit/animate.min.css" rel="stylesheet">

	<!-- Vendor css -->
	<link href="<?php echo base_url(); ?>public/assets/vendor/owlcarousel/owl.carousel.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>public/assets/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

	<!-- Template base -->
	<link href="<?php echo base_url(); ?>public/assets/css/theme-base.css" rel="stylesheet">

	<!-- Template elements -->
	<link href="<?php echo base_url(); ?>public/assets/css/theme-elements.css" rel="stylesheet">

	<!-- Responsive classes -->
	<link href="<?php echo base_url(); ?>public/assets/css/responsive.css" rel="stylesheet">

	<!-- Chart -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" />

	<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->


	<!-- Template color -->
	<link href="<?php echo base_url(); ?>public/assets/css/color-variations/orange.css" rel="stylesheet" type="text/css" media="screen">

	<!-- LOAD GOOGLE FONTS -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,800,700,600%7CRaleway:100,300,600,700,800" rel="stylesheet" type="text/css" />

	<!-- CSS CUSTOM STYLE -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/css/custom.css" media="screen" />

	<!--VENDOR SCRIPT-->
	<script src="<?php echo base_url(); ?>public/assets/vendor/jquery/jquery-1.11.2.min.js"></script>
	<script src="<?php echo base_url(); ?>public/assets/vendor/plugins-compressed.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
	<style>
		.header-transparent {
			background: #fff !important;
		}
	</style>
</head>

<body class="wide no-page-loader">


	<!-- WRAPPER -->
	<div class="wrapper">

		<!-- HEADER -->
		<header id="header" class="header-fullwidth header-transparent">
			<div id="header-wrap">
				<div class="container">

					<!--LOGO-->
					<div id="logo">
						<a href="index.html" class="logo" data-dark-logo="<?php echo base_url(); ?>public/assets/images/logopetak.png">
							<img src="<?php echo base_url(); ?>public/assets/images/logopetak.png" alt="Polo Logo">
						</a>
					</div>
					<!--END: LOGO-->

					<!--MOBILE MENU -->
					<div class="nav-main-menu-responsive">
						<button class="lines-button x" type="button" data-toggle="collapse" data-target=".main-menu-collapse">
							<span class="lines"></span>
						</button>
					</div>
					<!--END: MOBILE MENU -->

					<!--NAVIGATION-->
					<div class="navbar-collapse collapse main-menu-collapse navigation-wrap">
						<div class="container">
							<nav id="mainMenu" class="main-menu mega-menu">
								<ul class="main-menu nav nav-pills">
									<li><a href="<?= base_url() ?>Home/"><i class="fa fa-home"></i></a>
									</li>
									<li class="dropdown"> <a href="#">Profil Desa <i class="fa fa-angle-down"></i> </a>
										<ul class="dropdown-menu">
											<li><a href="<?= base_url() ?>Home/sejarah"><i class="fa fa-adjust"></i> Sejarah Desa</a></li>
											<li><a href="<?= base_url() ?>Home/gambaranumum"><i class="fa fa-adjust"></i> Gambaran Umum Desa</a></li>
											<li><a href="<?= base_url() ?>Home/beritadesa"><i class="fa fa-adjust"></i> Berita Desa</a></li>
										</ul>
									</li>
									<li class="dropdown"> <a href="#">Pemerintahan Desa <i class="fa fa-angle-down"></i> </a>
										<ul class="dropdown-menu">
											<li><a href="<?= base_url() ?>Home/visimisi"><i class="fa fa-check-circle"></i> Visi Dan Misi</a></li>
											<li><a href="<?= base_url() ?>Home/pemerintah"><i class="fa fa-check-circle"></i> Pemerintah Desa</a></li>
											<li><a href="<?= base_url() ?>Home/bpd"><i class="fa fa-check-circle"></i> Badan Permusyawaratan Desa</a></li>
										</ul>
									</li>
									<li class="dropdown"> <a href="#">LemMas <i class="fa fa-angle-down"></i> </a>
										<ul class="dropdown-menu">
											<li><a href="<?= base_url() ?>Home/lpm"><i class="fa fa-users"></i> LPM</a></li>
											<li><a href="<?= base_url() ?>Home/kartar"><i class="fa fa-users"></i> Karang Taruna</a></li>
											<li><a href="<?= base_url() ?>Home/pkk"><i class="fa fa-users"></i> PKK</a></li>
										</ul>
									</li>
									<li class="dropdown"> <a href="#">Data Desa <i class="fa fa-angle-down"></i> </a>
										<ul class="dropdown-menu">
											<li><a href="<?= base_url() ?>Home/sda"><i class="fa fa-database"></i> SDA</a></li>
											<li><a href="<?= base_url() ?>Home/sdm"><i class="fa fa-database"></i> SDM</a></li>
											<li><a href="<?= base_url() ?>Home/organisasi"><i class="fa fa-database"></i> Organisasi</a></li>
											<li><a href="<?= base_url() ?>Home/sarana"><i class="fa fa-database"></i> Sarana</a></li>
											<li><a href="<?= base_url() ?>Home/sosbud"><i class="fa fa-database"></i> Sosial Budaya</a></li>
										</ul>
									</li>
									<li><a href="#">Pengaduan Masyarakat<i class="fa fa-megaphone"></i></a>
									<li class="dropdown"> <a href="#">Covid 19 <i class="fa fa-angle-down"></i> </a>
										<ul class="dropdown-menu">
											<li><a href="#"><i class="fa fa-ambulance"></i> Covid 19</a></li>
											<li><a href="#"><i class="fa fa-ambulance"></i> New Normal</a></li>
											<li><a href="#"><i class="fa fa-ambulance"></i> Peta Sebaran</a></li>
											<li><a href="#"><i class="fa fa-ambulance"></i> Data Statistik</a></li>
										</ul>
									</li>
								</ul>
							</nav>
						</div>
					</div>
					<!--END: NAVIGATION-->
				</div>
			</div>
		</header>
		<!-- END: HEADER -->