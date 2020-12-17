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
                            <h2>Badan Permusyawaratan Desa Petak</h2>
                        </div>
                        <div class="post-info">
                            <span class="post-autor">Post by: Pemerintahan Desa Petak</span>
                        </div>
                        <div class="post-description">
                            <p>Secara yuridis, tugas Badan Permusyawaratan Desa mengacu kepada regulasi desa yakni</p>
                            <blockquote>
                                <p>Undang-Undang Nomor 6 Tahun 2014 tentang Desa</p>
                            </blockquote>
                            <p>Badan Permusyawaratan Desa yang selanjutnya disingkat BPD atau yang disebut dengan nama lain adalah lembaga yang melaksanakan fungsi pemerintahan yang anggotanya merupakan wakil dari penduduk Desa berdasarkan keterwakilan wilayah dan ditetapkan secara demokratis.</p>
                            <p>Dalam Permendagri No.110/2016 Badan Permusyawaratan Desa mempunyai fungsi, membahas dan menyepakati Rancangan Peraturan Desa bersama Kepala Desa, menampung dan menyalurkan aspirasi masyarakat desa, dan melakukan pengawasan kinerja kepala desa.</p>
                            <p>Selain melaksanakan fungsi diatas, Badan Permusyawaratan Desa juga mempunyai tugas sebagai berikut.<br>BPD mempunyai fungsi :</p>
                            <ol>
                                <li>Membahas dan menyepakati Rancangan Peraturan Desa Bersama Kepala Desa</li>
                                <li>Menampung dan menyalurkan aspirasi masyarakat Desa</li>
                                <li>Melakukan pengawasan kinerja Kepala Desa</li>
                            </ol>
                            <p>BPD mempunyai tugas :</p>
                            <ol>
                                <li>Menggali aspirasi masyarakat</li>
                                <li>Menampung aspirasi masyarakt</li>
                                <li>Mengelola aspirasi masyarakat</li>
                                <li>Menyalurkan aspirasi masyarakat</li>
                                <li>Menyelenggarakan musyawarah BPD</li>
                                <li>Menyelenggarakan musyawarah Desa</li>
                                <li>Membentuk panitia pemilihan Kepala Desa</li>
                                <li>Menyelenggarakan musyawarah Desa khusus untuk pemilihan Kepala Desa antarwaktu</li>
                                <li>Membahas dan menyepakati rancangan Peraturan Desa bersama Kepala Desa</li>
                                <li>Melaksanakan pengawasan terhadap kinerja Kepala Desa</li>
                                <li>Melakukan evaluasi laporan keterangan penyelenggaraan Pemerintahan Desa</li>
                                <li>Menciptakan hubungan kerja yang harmonis dengan Pemerintahan Desa dan lembaga Desa lainnya</li>
                                <li>Melaksanakan tugas lain yang diatur dalam ketentuan peraturan perundang-undangan</li>
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