<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 4 admin, bootstrap 4, css3 dashboard, bootstrap 4 dashboard, AdminWrap lite admin bootstrap 4 dashboard, frontend, responsive bootstrap 4 admin template, Xtreme admin lite design, Xtreme admin lite dashboard bootstrap 4 dashboard template">
	<meta name="description" content="Xtreme Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
	<meta name="robots" content="noindex,nofollow">
	<title>Admin Desa Petak</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
	<link rel="canonical" href="https://www.wrappixel.com/templates/xtreme-admin-lite/" />
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>public/admin/assets/images/favicon.png">
	<!-- Custom CSS -->
	<link href="<?= base_url() ?>public/admin/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="<?= base_url() ?>public/admin/dist/css/style.min.css" rel="stylesheet">
	<script src="<?= base_url() ?>public/admin/assets/libs/jquery/dist/jquery.min.js"></script>

	<!-- Bootstrap tether Core JavaScript -->
	<script src="<?= base_url() ?>public/admin/assets/libs/popper.js/dist/umd/popper.min.js"></script>
	<script src="<?= base_url() ?>public/admin/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>public/admin/dist/js/app-style-switcher.js"></script>
	<!--Wave Effects -->
	<script src="<?= base_url() ?>public/admin/dist/js/waves.js"></script>
	<!--Menu sidebar -->
	<script src="<?= base_url() ?>public/admin/dist/js/sidebarmenu.js"></script>

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.css" />
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.js"></script>

	<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous"></script>
	<script>
		function Question(callback, msg) {
			iziToast.question({
				timeout: 100000,
				close: true,
				overlay: true,
				displayMode: 'once',
				id: 'question',
				zindex: 999,
				title: '',
				message: msg,
				position: 'center',
				buttons: [
					['<button><b>YES</b></button>', function(instance, toast) {
						callback()
						instance.hide({
							transitionOut: 'fadeOut'
						}, toast, 'button');
					}, true],
					['<button>NO</button>', function(instance, toast) {
						instance.hide({
							transitionOut: 'fadeOut'
						}, toast, 'button');
					}],
				],
				onClosing: function(instance, toast, closedBy) {
					console.info('Closing | closedBy: ' + closedBy);
				},
				onClosed: function(instance, toast, closedBy) {
					console.info('Closed | closedBy: ' + closedBy);
				}
			});
		}
	</script>
</head>

<body>
	<!-- ============================================================== -->

	<!-- ============================================================== -->
	<!-- Main wrapper - style you can find in pages.scss -->
	<!-- ============================================================== -->
	<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
		<!-- ============================================================== -->
		<!-- Topbar header - style you can find in pages.scss -->
		<!-- ============================================================== -->
		<header class="topbar" data-navbarbg="skin5">
			<nav class="navbar top-navbar navbar-expand-md navbar-dark">
				<div class="navbar-header" data-logobg="skin5" style="background: #FFC300">
					<!-- ============================================================== -->
					<!-- Logo -->
					<!-- ============================================================== -->
					<a class="navbar-brand" href="<?= base_url() ?>">
						<!-- Logo icon -->
						<b class="logo-icon">
							<!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
							<!-- Dark Logo icon -->
							<img style="width: 40px" src="<?= base_url() ?>public/admin/assets/images/logokab.png" alt="homepage" class="dark-logo" />
							<!-- Light Logo icon -->
							<img style="width: 40px" src="<?= base_url() ?>public/admin/assets/images/logokab.png" alt="homepage" class="light-logo" />
						</b>
						<!--End Logo icon -->
						<!-- Logo text -->
						<span class="logo-text ml-2">
							Desa Petak
						</span>
					</a>
					<!-- ============================================================== -->
					<!-- End Logo -->
					<!-- ============================================================== -->
					<!-- This is for the sidebar toggle which is visible on mobile only -->
					<a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
				</div>
				<!-- ============================================================== -->
				<!-- End Logo -->
				<!-- ============================================================== -->
				<div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
				</div>
			</nav>
		</header>


		<aside class="left-sidebar" data-sidebarbg="skin6">
			<!-- Sidebar scroll-->
			<div class="scroll-sidebar">
				<!-- Sidebar navigation-->
				<nav class="sidebar-nav">
					<ul id="sidebarnav">
						<!-- User Profile-->
						<li>
							<!-- User Profile-->
							<div class="user-profile d-flex no-block dropdown m-t-20">
								<div class="user-pic"><img src="<?= base_url() ?>public/admin/assets/images/users/1.jpg" alt="users" class="rounded-circle" width="40" /></div>
								<div class="user-content hide-menu m-l-10">
									<a href="javascript:void(0)" class="" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<h5 class="m-b-0 user-name font-medium"> <?= $UserLogin->nama ?> <i class="fa fa-angle-down"></i></h5>
										<span class="op-5 user-email">Hi Admin !</span>
									</a>
									<div class="dropdown-menu dropdown-menu-right" aria-labelledby="Userdd">
										<a class="dropdown-item" href="<?= base_url() ?>Admin/profile"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
										<a class="dropdown-item" href="<?= base_url() ?>Admin/logout"><i class="mdi mdi-logout m-r-5 m-l-5"></i> Logout</a>

									</div>
								</div>
							</div>
							<!-- End User Profile-->
						</li>
						<!-- User Profile-->
						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url() ?>/Admin" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url() ?>/Admin/berita" aria-expanded="false"><i class="fa fa-newspaper"></i><span class="hide-menu">Berita</span></a></li>
						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url() ?>/Admin/pengaduan" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Pengaduan Masyarakat</span></a></li>
						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url() ?>/Admin/sda" aria-expanded="false"><i class="fa fa-leaf"></i><span class="hide-menu">Data SDA</span></a></li>
						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url() ?>/Admin/sdm" aria-expanded="false"><i class="fa fa-male"></i><span class="hide-menu">Data SDM</span></a></li>
						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url() ?>/Admin/sarana" aria-expanded="false"><i class="fa fa-building"></i><span class="hide-menu">Data Sarana Prasarana</span></a>
						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url() ?>/Admin/organisasi" aria-expanded="false"><i class="fa fa-sitemap"></i><span class="hide-menu">Data Organisasi</span></a>
						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url() ?>/Admin/sosbud" aria-expanded="false"><i class="fa fa-heart"></i><span class="hide-menu">Data Sosial Budaya</span></a>
						</li>
					</ul>

				</nav>
				<!-- End Sidebar navigation -->
			</div>
			<!-- End Sidebar scroll-->
		</aside>