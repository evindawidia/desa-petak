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
                            <h2>Karang Taruna</h2>
                        </div>
                        <div class="post-info">
                            <span class="post-autor">Post by: Pemerintahan Desa Petak</span>
                        </div>
                        <div class="post-description">
                            <h5>TUGAS KARANG TARUNA :</h5>
                            <p>menanggulangi berbagai masalah kesejahteraan sosial terutama yang dihadapi generasi muda, baik yang bersifat preventif, rehabilitatif, maupun pengembangan potensi generasi muda di lingkungannya</p>
                            <br>
                            <h5>FUNGSI KARANGTARUNA : </h5>
                            <ol>
                                <li>Penyelenggara usaha kesejahteraan sosial</li>
                                <li>Penyelenggara pendidikan dan pelatihan bagi masyarakat</li>
                                <li>Penyelenggara pemberdayaan masyarakat terutama generasi muda di lingkungannya secara komprehensif, terpadu dan terarah serta berkesinambungan</li>
                                <li>Penyelenggara kegiatan pengembangan jiwa kewirausahaan bagi generasi muda di lingkungannya</li>
                                <li>Penanaman pengertian, memupuk dan meningkatkan kesadaran tanggung jawab sosial generasi muda</li>
                                <li>Penumbuhan dan pengembangan semangat kebersamaan, jiwa kekeluargaan, kesetiakawanan sosial dan memperkuat nilai-nilai kearifan dalam bingkai Negara Kesatuan Republik Indonesia</li>
                                <li>Pemupukan kreatifitas generasi muda untuk dapat mengembangkan tanggung jawab sosial yang bersifat rekreatif, kreatif, edukatif, ekonomis produktif dan kegiatan praktis lainnya dengan mendayagunakan segala sumber dan potensi kesejahteraan sosial di lingkungannya secara swadaya</li>
                                <li>Penyelenggara rujukan, pendampingan dan advokasi sosial bagi penyandang masalah kesejahteraan sosial</li>
                                <li>Penguatan sistem jaringan komunikasi, kerjasama, informasi dan kemitraan dengan berbagai sektor lainnya</li>
                                <li>Penyelenggara usaha-usaha pencegahan permasalahan sosial yang aktual</li>
                                <li>Pengembangan kreatifitas remaja, pencegahan kenakalan, penyalahgunaan obat terlarang (narkoba) bagi remaja</li>
                                <li>Penanggulangan masalah-masalah sosial, baik secara preventif, rehabilitatif dalam rangka pencegahan kenakalan remaja, penyalahgunaan obat terlarang (narkoba) bagi remaja</li>
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
                            <li><a href="<?= base_url() ?>Home/beritadetail?id=<?= $b->id_berita ?>"><?= $b->judul_berita ?></a>
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