<div class="page-wrapper">

	<div class="page-breadcrumb">
		<div class="row align-items-center">
			<div class="col-5">
				<h4 class="page-title">pengaduan</h4>
				<div class="d-flex align-items-center">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?= base_url()?>Admin/">Admin</a></li>
							<li class="breadcrumb-item active" aria-current="page">pengaduan</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid">

		<div class="row">
			<!-- column -->
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<!-- title -->
						<div class="d-md-flex align-items-center">
							<div>
								<h4 class="card-title">pengaduan Desa</h4>
								<h5 class="card-subtitle">pengaduan Desa Terbaru Desa Petak</h5>
							</div>
						</div>
                        <!-- title -->
					</div>
                    <?= $this->session->flashdata('msg') ?>
					<div class="table-responsive p-3">
                        <table class="table table-striped table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>Tanggal Post</th>
                                    <th>Uraian</th>
                                    <th>Pengaduan</th>
                                    <th>NIK Pengaduan</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach ($pengaduan as $p){?>
                                <tr>
                                    <td><?= $p->date_created ?></td>
                                    <td><?= $p->sender_name ?></td>
                                    <td><?= $p->comment ?></td>
                                    <td><?= $p->nik ?></td>
                                    <td><?= $p->address ?></td>
                                    <td class="d-flex">
                                        <a href="<?= base_url()?>Admin/balaspengaduan?id=<?= $p->id_pengaduan ?>" class="btn btn-info"><i class="fa fa-reply"></i> Balas</a>
										<a href="<?= base_url()?>Admin/deletepengaduan?id=<?= $p->id_pengaduan ?>" class="btn btn-danger delete"><i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                </tr>
                                <?php } ?>
                        </table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer class="footer text-center">
        <a>Copyright &copy Desa Mojoroto <?= date("Y")?> Created by Evinda Widia Cahyaningrum</a>
	</footer>
</div>
