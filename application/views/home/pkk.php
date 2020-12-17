<!-- CONTENT -->
<section class="content">
    <div class="container">
        <div class="row">
            <!-- Blog post-->
            <div class="post-content post-modern post-content-single col-md-9">
                <!-- Post item-->
                <div class="post-item">
                    <div class="post-image">
                        <a href="#">
                            <img alt="" src="<?php echo base_url(); ?>public/assets/images/cobasejarah.jpg">
                        </a>
                    </div>
                    <div class="post-content-details">
                        <div class="post-title">
                            <h2>PKK</h2>
                        </div>
                        <div class="post-info">
                            <span class="post-autor">Post by: Pemerintahan Desa Petak</span>
                        </div>
                        <div class="post-description">
                            <h5>TUGAS PKK :</h5>
                            <ol>
                                <li>Menyusun rencana kerja PKK Desa/Kelurahan, sesuai dengan basil Rakerda Kabupaten/Kota</li>
                                <li>Melaksanakan kegiatan sesuai jadwal yang disepakati</li>
                                <li>Menyuluh dan menggerakkan kelompok-kelompok PKK Dusun/Lingkungan, RW, RT dan dasa wisma agar dapat mewujudkan kegiatan-kegiatan yang telah disusun dan disepakati</li>
                                <li>Menggali, menggerakan dan mengembangkan potensi masyarakat, khususnya keluarga untuk meningkatkan kesejahteraan keluarga sesuai dengan kebijaksanaan yang telah ditetapkan</li>
                                <li>Melaksanakan kegiatan penyuluhan kepada keluarga-keluarga yang mencakup kegiatan bimbingan dan motivasi dalam upaya mencapai keluarga sejahtera</li>
                                <li>Mengadakan pembinaan dan bimbingan mengenai pelaksanaan program kerja</li>
                                <li>Berpartisipasi dalam pelaksanaan program instansi yang berkaitan dengan kesejahteraan keluarga di desa/kelurahan</li>
                                <li>Membuat laporan basil kegiatan kepada Tim Penggerak PKK Kecamatan dengan tembusan kepada Ketua Dewan Penyantun Tim Penggerak PKK setempat</li>
                                <li>Melaksanakan tertib administrasi</li>
                                <li>Mengadakan konsultasi dengan Ketua Dewan Penyantun Tim Penggerak PKK setempat</li>
                            </ol>
                            <br>
                            <h5>FUNGSI PKK : </h5>
                            <ol>
                                <li>Penyuluh, motivator dan penggerak masyarakat agar mau dan mampu melaksanakan program PKK</li>
                                <li>Fasilitator, perencana, pelaksana, pengendali, pembina dan pembimbing Gerakan PKK</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Blog post-->

            <!-- Sidebar-->
            <div class="sidebar sidebar-modern col-md-3">
                <!--widget blog articles-->
                <div class="widget clearfix widget-blog-articles">
                    <h4 class="widget-title">Berita Desa</h4>
                    <ul class="list-posts list-medium">
                        <?php foreach ($Berita as $b) { ?>
                            <li><a href="#"><?= $b->judul_berita ?></a>
                                <small><?php echo date("d F Y", strtotime($b->date_created)) ?></small>
                                <img alt="" src="<?= $b->getImage() ?>" class="img-fluid" style="width:100px">
                                <p><?= $b->getShortContent() ?></p>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <!--end: widget blog articles-->

            </div>
            <!-- END: Sidebar-->
        </div>
    </div>
</section>
<!-- END: SECTION -->