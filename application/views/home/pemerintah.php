<!-- CONTENT -->
<section class="content">
    <div class="container">
        <div class="row">
            <!-- Blog post-->
            <div class="post-content post-modern post-content-single col-md-9">
                <!-- Post item-->
                <div class="post-item">
                    <div class="post-image">
                        <a>
                            <img alt="" src="<?php echo base_url(); ?>public/assets/images/cobasejarah.jpg">
                        </a>
                    </div>
                    <div class="post-content-details">
                        <div class="post-title">
                            <h2>Pemerintah Desa Petak</h2>
                        </div>
                        <div class="post-info">
                            <span class="post-autor">Post by: Pemerintahan Desa Petak</span>
                        </div>
                        <div class="post-description">
                            <a>
                                <img alt="" src="<?php echo base_url(); ?>public/assets/images/mindmap.jpg">
                            </a>
                            <p>Kepala Desa bertugas menyelenggarakan Pemerintahan Desa, melaksanakan pembangunan, pembinaan kemasyarakatan, dan pemberdayaan masyarakat. Untuk melaksanakan tugas Kepala Desa memiliki fungsi-fungsi sebagai berikut :</p>
                            <ol>
                                <li>Menyelenggarakan Pemerintahan Desa, seperti tata praja Pemerintahan, penetapan peraturan di desa, pembinaan masalah pertanahan, pembinaan ketentraman dan ketertiban, melakukan upaya perlindungan masyarakat, administrasi kependudukan, dan penataan dan pengelolaan wilayah.</li>
                                <li>Melaksanakan pembangunan, seperti pembangunan sarana prasarana perdesaan, dan pembangunan bidang pendidikan, kesehatan.</li>
                                <li>Pembinaan kemasyarakatan, seperti pelaksanaan hak dan kewajiban masyarakat, partisipasi masyarakat, sosial budaya masyarakat, keagamaan, dan ketenagakerjaan.</li>
                                <li>Pemberdayaan masyarakat, seperti tugas sosialisasi dan motivasi masyarakat di bidang budaya, ekonomi, politik, lingkungan hidup, pemberdayaan keluarga, pemuda, olahraga, dan karang taruna.</li>
                                <li>Menjaga hubungan kemitraan dengan lembaga masyarakat dan lembaga lainnya.</li>
                            </ol>
                            <p>Sekretaris Desa berkedudukan sebagai unsur pimpinan Sekretariat Desa. Sekretaris Desa bertugas membantu Kepala Desa dalam bidang administrasi pemerintahan. Untuk melaksanakan tugas, Sekretaris Desa mempunyai fungsi :</p>
                            <ol>
                                <li>Melaksanakan urusan ketatausahaan seperti tata naskah, administrasi surat menyurat, arsip, dan ekspedisi.</li>
                                <li>Melaksanakan urusan umum seperti penataan administrasi perangkat desa, penyediaan prasarana perangkat desa dan kantor, penyiapan rapat, pengadministrasian aset, inventarisasi, perjalanan dinas, dan pelayanan umum.</li>
                                <li>Melaksanakan urusan keuangan seperti pengurusan administrasi keuangan, administrasi sumber-sumber pendapatan dan pengeluaran, verifikasi administrasi keuangan, dan admnistrasi penghasilan Kepala Desa, Perangkat Desa, BPD, dan lembaga pemerintahan desa lainnya.</li>
                                <li>Melaksanakan urusan perencanaan seperti menyusun rencana anggaran pendapatan dan belanja desa, menginventarisir data-data dalam rangka pembangunan, melakukan monitoring dan evaluasi program, serta penyusunan laporan.</li>
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