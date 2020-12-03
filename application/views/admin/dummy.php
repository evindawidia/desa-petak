<div class="page-wrapper">

	<div class="page-breadcrumb">
		<div class="row align-items-center">
			<div class="col-5">
				<h4 class="page-title">Dashboard</h4>
				<div class="d-flex align-items-center">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?= base_url()?>Admin/">Admin</a></li>
							<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>

	<?= $this->session->flashdata('msg') ?>
	<div class="container-fluid">

		<div class="row">
			<!-- column -->
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<!-- title -->
						<div class="d-md-flex align-items-center">
							<div>
								<h4 class="card-title">Berita Desa</h4>
								<h5 class="card-subtitle">Berita Desa Terbaru Desa Petak</h5>
							</div>
						</div>
                        <!-- title -->
                        
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer class="footer text-center">
        <a>Copyright &copy Desa Mojoroto <?= date("Y")?> Created by Evinda Widia Cahyaningrum</a>
	</footer>
</div>
