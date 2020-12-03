<div class="page-wrapper">

	<div class="page-breadcrumb">
		<div class="row align-items-center">
			<div class="col-5">
				<h4 class="page-title">Pengaduan</h4>
				<div class="d-flex align-items-center">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?= base_url()?>Admin/">Admin</a></li>
							<li class="breadcrumb-item active" aria-current="page">Pengaduan</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid">
        <?= $this->session->flashdata('msg') ?>
		<div class="row">
			<!-- column -->
			<div class="col-6">
				<div class="card">
					<div class="card-body">
						<!-- title -->
						<div class="d-md-flex align-items-center">
							<div>
								<h4 class="card-title">Pengaduan Desa</h4>
								<h5 class="card-subtitle">Pengaduan Desa Terbaru Desa Petak</h5>
							</div>
						</div>
                        
						<!-- title -->
						<div class="col-md-12">
							<div class="form-group">
								<label>Tanggal Posting</label>
								<input class="form-control" readonly value="<?= $pengaduan->date_created?>">
							</div>
							<div class="form-group">
								<label>Pengirim</label>
								<input class="form-control" readonly value="<?= $pengaduan->sender_name?>">
							</div>
							<div class="form-group">
								<label>NIK</label>
								<input class="form-control" readonly value="<?= $pengaduan->nik?>">
							</div>
							<div class="form-group">
								<label>Alamat</label>
								<input class="form-control" readonly value="<?= $pengaduan->address?>">
							</div>
							<div class="form-group">
								<label>Comment</label>
								<div class="form-control" readonly>
									<?= $pengaduan->comment ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-6">
				<div class="card">
					<div class="card-body">
						<!-- title -->
						<div class="d-md-flex align-items-center">
							<div>
								<h4 class="card-title">Balasan Pengaduan</h4>
							</div>
						</div>
						<!-- title -->
						<div class="col-md-12">
							<form action="<?= base_url()?>Admin/doaddbalasan?id=<?= $pengaduan->id_pengaduan ?>"
								method="POST">
								<div class="form-group">
									<label>Balasan</label>
									<textarea class="form-control" name="comment"></textarea>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-success btn-block">Tambah Balasan</button>
								</div>
							</form>
						</div>
						<div class="col-md-12">
							<hr>
							<h4 class="card-title">Daftar Balasan</h4>
							<table class="table table-striped table-bordered datatable">
								<thead>
									<tr>
										<th>Tanggal Posting</th>
										<th>Balasan</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>

									<?php foreach($balasan as $b){ ?>
									<tr>
										<td><?= $b->date_created ?></td>
										<td><?= $b->comment ?></td>
										<td><a href="<?= base_url() ?>Admin/deletebalasan?id=<?=$b->id_balasan?>&id_pengaduan=<?=$pengaduan->id_pengaduan?>"
												class="btn btn-danger delete"><i class="fa fa-trash"></i> Delete</a></td>
									</tr>
									<?php } ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer class="footer text-center">
		<a>Copyright &copy Desa Mojoroto <?= date("Y")?> Created by Evinda Widia Cahyaningrum</a>
	</footer>
</div>
