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
                            <img alt="" src="https://asset.kompas.com/crops/E6yIUW-qeRszhUYBw7d9pv9ae0g=/0x0:1200x800/750x500/data/photo/2020/06/29/5ef9b37e23c81.jpg">
                        </a>
                    </div>
                    <div class="post-content-details">
                        <div class="post-title">
                            <h2>Lembaga Pemberdayaan Masyarakat</h2>
                        </div>
                        <div class="post-info">
                            <span class="post-autor">Post by: Pemerintahan Desa Petak</span>
                        </div>
                        <div class="post-description">
                            <p>Lembaga Pemberdayaan Masyarakat (LPM) adalah salah satu lembaga kemasyaratan yang berada di desa. Lembaga Pemberdayaan Masyarakat mempunyai tugas menyusun rencana pembangunan secara partisipatif, menggerakkan swadaya gotong royong masyarakat, melaksanakan dan mengendalikan pembangunan.</p>
                            <h5>FUNGSI LPM :</h5>
                            <ol>
                                <li>Penampungan dan penyaluran aspirasi masyarakat dalam pembangunan</li>
                                <li>Penanaman dan pemupukan rasa persatuan dan kesatuan masyarakat dalam kerangka memperkokoh Negara Kesatuan Republik Indonesia</li>
                                <li>Peningkatan kualitas dan percepatan pelayanan pemerintah kepada masyarakat</li>
                                <li>Penyusunan rencana, pelaksanaan, pelestarian dan pengembangan hasil-hasil pembangunan secara partisipatif</li>
                                <li>Penumbuhkembangan dan penggerak prakarsa, partisipasi, serta swadaya gotong royong masyarakat</li>
                                <li>Penggali, pendayagunaan dan pengembangan potensi sumber daya alam serta keserasian lingkungan hidup</li>
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