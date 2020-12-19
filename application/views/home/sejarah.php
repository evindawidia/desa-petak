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
                            <h2>Sejarah Desa Petak</h2>
                        </div>
                        <div class="post-info">
                            <span class="post-autor">Post by: Pemerintahan Desa Petak</span>
                        </div>
                        <div class="post-description">
                            <p>Konon nama Desa Petak berasal dari kata Petak yang artinya warna putih Sebab pada zaman dahulu di Desa tersebut terdapat aliran religi yang sangat mendarah daging di masyarakat sampai sekarang sehingga Religi tersebut identic dengan warna Putih ( Putihan ) dalam bahasa Jawa berarti “ PETAK “. Terakhir Kepala Desa Petak diangkat dengan</p>
                            <blockquote>
                                <p>Keputusan Bupati Mojokerto Nomor : 188.45/ /HK/416-012/2019 tahun 2019</p>
                                <small>tentang <cite>Pengangkatan Kepala Desa Petak</cite></small>
                            </blockquote>
                            <p>Desa Petak merupakan salah satu desanya Kabupaten Mojokerto dimana Kabupaten Mojokerto sendiri merupakan Kabupatennya desa-desa di Kabupaten Mojokerto termasuk desa Petak ini, sehingga kegagalan dan keberhasilan pembangunan desa sekaligus menjadi indikator kegagalan dan keberhasilan Kabupaten Mojokerto.Oleh sebab itu sangatlah tidak bijaksana jika terjadi hal-hal yang tidak diinginkan di desa dikatakan karena kesalahan manajemen pemerintahan di tingkat desa saja.Apa lagi setiap ada arah kebijakan positif, para penyelenggara pemerintahan desa selalu dianggap belum cakap untuk melaksanakannya sehingga terjadi hal-hal yang sulit diterima oleh Pemerintah Desa.</p>


                            <p>Adanya Program Pemerintah 1 desa 1 milyar merupakan kesempatan sekaligus tantangan bagi desa untuk lebih mandiri dalam menyusun perencanaan pembangunan, melaksanakan pembangunan dan mempertanggungjawabkannya. Hanya saja kewenangan pengelolaan dana pembangunan yang menjadi haknya untuk menunjang pelaksanaan pembangunan di desanya masing-masing masih terasa belum benar-benar diterima oleh Desa, termasuk untuk desa Petak Oleh sebab itu kami menghimbau dan berharap kepada instansi terkait agar tidak membatasi kewenangan desa yang sudah menjadi ketentuan bersama.</p>
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