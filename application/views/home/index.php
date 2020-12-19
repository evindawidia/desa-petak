<!-- SLIDER -->
<section id="slider" class="no-padding">

	<div id="slider-carousel" class="boxed-slider">

		<div style="background-image:url('https://cdn-radar.jawapos.com/uploads/radarmojokerto/news/2017/07/13/balai-desa-termahal-dan-termegah-ini-fotonya_m_970.jpeg');" class="owl-bg-img">

			<div class="container-fullscreen">
				<div class="text-middle">
					<div class="container" style="background: rgba(255,255,255,0.6);padding: 20px;">
						<div class="text-center slider-content">
							<h2 class="text-large m-b-0">Selamat Datang</h2>
							<h2 class="text-medium">di Website Resmi Desa Petak</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div style="background-image:url('https://stptrisakti.ac.id/wp-content/uploads/2016/05/20160531-desaPetak.jpg');" class="owl-bg-img">

			<div class="container-fullscreen">
				<div class="text-middle">
					<div class="container" style="background: rgba(255,255,255,0.6);padding: 20px;">
						<div class="slider-content">
							<h2 class="text-large m-b-0">Profil<br /> Wilayah</h2>
							<h2 class="text-medium">Desa Petak</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div style="background-image:url('https://stptrisakti.ac.id/wp-content/uploads/2016/05/20160531-desaPetak.jpg');" class="owl-bg-img">

			<div class="container-fullscreen">
				<div class="text-middle">
					<div class="container" style="background: rgba(255,255,255,0.6);padding: 20px;">
						<div class="slider-content">
							<h2 class="text-large m-b-0">POLO<br /> CORPORATE</h2>
							<h2 class="text-medium">INTERNATIONAL COMPANY</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- END: SLIDER -->

<!-- SERVICES -->
<section class="p-t-100">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="icon-box effect square medium color">
					<div class="icon">
						<a href="#"><i class="fa fa-map"></i></a>
					</div>
					<a href="#">
						<h3>Batas - Batas Desa</h3>
					</a>
					<p>Desa Petak berbatasan dengan 6 Desa di kecamatan Pacet. Yaitu Desa Warugunung, Desa Bendunganjati, Desa Cempokolimo, Desa Pacet, Desa Sajen, Desa Kesimantengah</p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="icon-box effect square medium color">
					<div class="icon">
						<a href="#"><i class="fa fa-lightbulb-o"></i></a>
					</div>
					<a href="#">
						<h3>Visi Desa</h3>
					</a>
					<p>Aparatur Desa Petak dan Masyarakat setempat sepakat bahwa Visi adalah gambaran umum dari kondisi yang ideal yang dibutuhkan oleh Desa Petak di masa yang akan datang yang dicapai bersama dengan partisipasi masyarakat untuk jangka waktu tertentu.</p>
				</div>
			</div>

			<div class="col-md-4">
				<div class="icon-box effect square medium color">
					<div class="icon">
						<a href="#"><i class="fa fa-trophy"></i></a>
					</div>
					<a href="#">
						<h3>Misi Desa</h3>
					</a>
					<p>Selain mempunyai visi, desa Petak juga mempunyai misi yang jelas dan baik.Misi Membangun Perencanaan yang Akuntabel, Misi Mewujudkan penyelenggaraan pertanian yang bermutu, Misi Memberikan Pengembangan Keterampilan dan Kreativitas Masyarakat.</p>
				</div>
			</div>

			<div class="col-md-4">
				<div class="icon-box effect square medium color">
					<div class="icon">
						<a href="#"><i class="fa fa-globe"></i></a>
					</div>
					<a href="#">
						<h3>LPM</h3>
					</a>
					<p> Lembaga Pemberdayaan Masyarakat (LPM) adalah salah satu lembaga kemasyaratan yang berada di desa.</p>
				</div>
			</div>

			<div class="col-md-4">
				<div class="icon-box effect square medium color">
					<div class="icon">
						<a href="#"><i class="fa fa-tree"></i></a>
					</div>
					<a href="#">
						<h3>SDA</h3>
					</a>
					<p>Desa Petak memiliki sumber daya alam yang baik dan melimpah, dimana SDA tersebut digunakan dengan baik oleh penduduk desa</p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="icon-box effect square medium color">
					<div class="icon">
						<a href="#"><i class="fa fa-users"></i></a>
					</div>
					<a href="#">
						<h3>SDM</h3>
					</a>
					<p>Berdasarkan data yang dimiliki Kantor Pemerintah Desa Petak, jumlah penduduk di Desa Petak mencapai 3738 orang. </p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- END: SERVICES -->

<!-- BLOG -->
<section class="background-grey">
	<div class="container">
		<div data-animation-delay="100" data-animation="fadeInUp">
			<div class="heading heading heading-center">
				<h1 class="text-medium">Berita Desa</h1>
				<span class="lead">Berikut adalah berita dan event desa</span>
			</div>
		</div>
		<div id="blog">
			<div class="container">
				<!-- Blog post-->
				<div class="post-content post-block post-light-background post-3-columns">
					<!-- Blog image post-->
					<?php
					foreach ($Berita as $b) { ?>
						<div class="post-item" data-animation="fadeInUp" data-animation-delay="0">
							<div class="post-image">
								<a href="#">
									<img alt="" src="<?= $b->getImage() ?>">
								</a>
							</div>
							<div class="post-content-details">
								<div class="post-title">
									<h3><a href="<?= base_url() ?>Home/beritadetail?id=<?= $b->id_berita ?>"><?= $b->judul_berita ?></a></h3>
								</div>
								<div class="post-info">
									<span class="post-autor">Post by: Pemerintahan Desa Petak</span>
									<span class="post-category">in <?= $b->getKatBerita() ?></span>
								</div>
								<div class="post-description">
									<p><?= $b->getShortContent() ?></p>

									<div class="post-info">
										<a class="read-more" href="<?= base_url() ?>Home/beritadetail?id=<?= $b->id_berita ?>">read more <i class="fa fa-long-arrow-right"></i></a>
									</div>
								</div>
							</div>

							<div class="post-meta">
								<div class="post-date">
									<span class="post-date-day"><?php echo date("d F Y", strtotime($b->date_created)) ?></span>
								</div>

								<div class="post-comments">
									<a href="<?= base_url() ?>Home/beritadetail?id=<?= $b->id_berita ?>">
										<i class="fa fa-comments-o"></i>
										<span class="post-comments-number"><?php echo count($b->getComment()); ?></span>
									</a>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
				<!-- END: Blog post-->
			</div>
		</div>

	</div>
</section>
<!-- BLOG -->