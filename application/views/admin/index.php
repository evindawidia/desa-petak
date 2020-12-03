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
                        <div class="ml-auto">
                            <hr>
                            <a href="<?= base_url()?>Admin/addberita" class="btn btn-success"><i class="fa fa-plus"></i> Berita</a>
                        </div>
					</div>
                    <?= $this->session->flashdata('msg') ?>
					<div class="table-responsive p-3">
                        <table class="table table-striped table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Tanggal Posting</th>
                                    <th>Judul</th>
                                    <th>Content Preview</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach ($Berita as $b){?>
                                <tr>
                                    <td>
										<img src="<?= $b->getImage() ?>" class="img-fluid" style="width:100px">
									</td>
                                    <td><?= $b->date_created ?></td>
                                    <td><?= $b->judul_berita ?></td>
                                    <td><?= $b->getShortContent() ?></td>
                                    <td class="d-flex">
                                        <a href="<?= base_url("Admin/editberita?id=".$b->id_berita)?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
                                        <a href="<?= base_url("Admin/deleteberita?id=".$b->id_berita)?>" class="btn btn-danger delete"><i class="fa fa-trash"></i> Delete</a>
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
